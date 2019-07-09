<div class="jumbotron col-12" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Domaine</span><span class="col-6 offset-6">{recherche-domaine}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Intitulé de formation</span><span class="col-4 offset-4">{recherche-intitulé}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Objectif</span><span class="col-3 offset-5">{recherche-objectif}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Diplôme obtenu</span><span class="col-3 offset-5">{recherche-diplome}</span></p>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Modules</span><span class="col-3 offset-5">{recherche-module}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Organismes responsables</span><span class="col-3 offset-5">{recherche-organisme}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Validation</span><span class="col-3 offset-5">{recherche-validation}</span></p>
            <p class="col-md-6 col-sm-12 col-xs-12"><span>Certification</span><span class="col-3 offset-5">{recherche-certification}</span></p>
        </div>
    </div>
</div>
<div class="table-wrapper">
    <div class="dropdown">
         <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Choix des colonnes</button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <option class="option-col" value="id" data-column="0">ID</option>
           <option class="option-col" value="domain" data-column="1" style="cursor: pointer;">Domaine</option>
           <option class="option-col" value="tag" data-column="2" style="cursor: pointer;">Intitulé</option>
           <option class="option-col" value="graduate" data-column="3" style="cursor: pointer;">Diplôme obtenu</option>
           <option class="option-col" value="certif" data-column="4" style="cursor: pointer;">Certification</option>
         </div>
   </div>
       <table class="cell-border stripe" id="table-domain" style="text-align: center">
           <thead>
               <tr>
                   <th class="id" name="id-domain"></th>
                   <th name="domain">Domaine</th>
                   <th name="tag">Intitulé</th>
                   <th name="graduate">Diplôme obtenu</th>
                   <th name="certif">Certification</th>
                   <th name="details">Détails</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td class="id">Info 1</td>
                   <td>info 2</td>
                   <td>Info 3</td>
                   <td>Info 4</td>
                   <td>Info 5</td>
                   <td><a href="" class="btn btn-primary">Voir details</a></td>
               </tr>
           </tbody>
       </table>
   </div>