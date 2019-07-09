<?php
if (!defined('PASSWORD_DEFAULT')) {
        define('PASSWORD_BCRYPT', 1);
        define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
}

    Class Password {

        public function __construct() {}
        /**
         * Hash le mot de passe en utilisant l'algorithme spécifié
         *
         * @param string $password Le mot de passe à hasher
         * @param int    $algo     L'algorithme à utiliser (Défini par PASSWORD_* constants)
         * @param array  $options  Les options pour l'algo à utiliser
         *
         * @return string|false Le mot de passe haché, ou false en cas d'erreur.
         */
        function password_hash($password, $algo, array $options = array()) {
            if (!function_exists('crypt')) {
                trigger_error("Crypt doit être chargé pour que password_hash puisse fonctionner", E_USER_WARNING);
                return null;
            }
            if (!is_string($password)) {
                trigger_error("password_hash(): Le mot de passe doit être une chaîne", E_USER_WARNING);
                return null;
            }
            if (!is_int($algo)) {
                trigger_error("password_hash() s'attend à ce que le paramètre 2 soit long, " . gettype($algo) . " given", E_USER_WARNING);
                return null;
            }
            switch ($algo) {
                case PASSWORD_BCRYPT :
                    // Notez qu'il s'agit d'une constante C, mais non exposée à PHP, nous ne le définissons donc pas ici.
                    $cost = 10;
                    if (isset($options['cost'])) {
                        $cost = $options['cost'];
                        if ($cost < 4 || $cost > 31) {
                            trigger_error(sprintf("password_hash(): paramètre de coût bcrypt non valide spécifié: %d", $cost), E_USER_WARNING);
                            return null;
                        }
                    }
                    // La longueur du grain de sel à générer
                    $raw_salt_len = 16;
                    // La longueur requise dans la sérialisation finale
                    $required_salt_len = 22;
                    $hash_format = sprintf("$2y$%02d$", $cost);
                    break;
                default :
                    trigger_error(sprintf("password_hash(): Algorithme de hachage de mot de passe inconnu: %s", $algo), E_USER_WARNING);
                    return null;
            }
            if (isset($options['salt'])) {
                switch (gettype($options['salt'])) {
                    case 'NULL' :
                    case 'boolean' :
                    case 'integer' :
                    case 'double' :
                    case 'string' :
                        $salt = (string)$options['salt'];
                        break;
                    case 'object' :
                        if (method_exists($options['salt'], '__tostring')) {
                            $salt = (string)$options['salt'];
                            break;
                        }
                    case 'array' :
                    case 'resource' :
                    default :
                        trigger_error('password_hash(): Paramètre salt non-string fourni', E_USER_WARNING);
                        return null;
                }
                if (strlen($salt) < $required_salt_len) {
                    trigger_error(sprintf("password_hash(): À condition que le sel soit trop court: %d attend %d", strlen($salt), $required_salt_len), E_USER_WARNING);
                    return null;
                } elseif (0 == preg_match('#^[a-zA-Z0-9./]+$#D', $salt)) {
                    $salt = str_replace('+', '.', base64_encode($salt));
                }
            } else {
                $buffer = '';
                $buffer_valid = false;
                if (function_exists('random_bytes') && !defined('PHALANGER')) {
                    $buffer = random_bytes($raw_salt_len);
                    if ($buffer) {
                        $buffer_valid = true;
                    }
                }
                if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
                    $buffer = openssl_random_pseudo_bytes($raw_salt_len);
                    if ($buffer) {
                        $buffer_valid = true;
                    }
                }
                if (!$buffer_valid && is_readable('/dev/urandom')) {
                    $f = fopen('/dev/urandom', 'r');
                    $read = strlen($buffer);
                    while ($read < $raw_salt_len) {
                        $buffer .= fread($f, $raw_salt_len - $read);
                        $read = strlen($buffer);
                    }
                    fclose($f);
                    if ($read >= $raw_salt_len) {
                        $buffer_valid = true;
                    }
                }
                if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
                    $bl = strlen($buffer);
                    for ($i = 0; $i < $raw_salt_len; $i++) {
                        if ($i < $bl) {
                            $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                        } else {
                            $buffer .= chr(mt_rand(0, 255));
                        }
                    }
                }
                $salt = str_replace('+', '.', base64_encode($buffer));
            }
            $salt = substr($salt, 0, $required_salt_len);

            $hash = $hash_format . $salt;

            $ret = crypt($password, $hash);

            if (!is_string($ret) || strlen($ret) <= 13) {
                return false;
            }

            return $ret;
        }

        /**
         * @param string $hash Le hash du mot de passe pour extraire les informations de
         *
         * @return array Le tableau d'informations sur le hachage.
         */
        function password_get_info($hash) {
            $return = array('algo' => 0, 'algoName' => 'unknown', 'options' => array(), );
            if (substr($hash, 0, 4) == '$2y$' && strlen($hash) == 60) {
                $return['algo'] = PASSWORD_BCRYPT;
                $return['algoName'] = 'bcrypt';
                list($cost) = sscanf($hash, "$2y$%d$");
                $return['options']['cost'] = $cost;
            }
            return $return;
        }

        /**
         * Déterminez si le hachage du mot de passe doit être réorganisé en fonction des options fournies
         *
         * Si la réponse est true, après avoir validé le mot de passe à l'aide de password_verify, réorganisez-le.
         *
         * @param string $hash    Le hash à tester
         * @param int    $algo    L'algorithme utilisé pour les nouveaux hachages de mots de passe
         * @param array  $options Le tableau d'options passé à password_hash
         *
         * @return boolean Vrai si le mot de passe doit être modifié.
         */
        function password_needs_rehash($hash, $algo, array $options = array()) {
            $info = password_get_info($hash);
            if ($info['algo'] != $algo) {
                return true;
            }
            switch ($algo) {
                case PASSWORD_BCRYPT :
                    $cost = isset($options['cost']) ? $options['cost'] : 10;
                    if ($cost != $info['options']['cost']) {
                        return true;
                    }
                    break;
            }
            return false;
        }

        /**
         * Vérifier un mot de passe contre un hachage en utilisant une approche résistante aux attaques de synchronisation
         *
         * @param string $password Le mot de passe pour vérifier
         * @param string $hash     Le hash à vérifier contre
         *
         * @return boolean Si le mot de passe correspond au hash
         */
        public function password_verify($password, $hash) {
            if (!function_exists('crypt')) {
                trigger_error("Crypt must be loaded for password_verify to function", E_USER_WARNING);
                return false;
            }
            $ret = crypt($password, $hash);
            if (!is_string($ret) || strlen($ret) != strlen($hash) || strlen($ret) <= 13) {
                return false;
            }

            $status = 0;
            for ($i = 0; $i < strlen($ret); $i++) {
                $status |= (ord($ret[$i]) ^ ord($hash[$i]));
            }

            return $status === 0;
        }

    }
