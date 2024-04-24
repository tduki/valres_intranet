<!-- Nouveau Modal Bootstrap pour la modification des permissions -->
<div class="modal fade" id="nouveauModifierPopup" tabindex="-1" aria-labelledby="nouveauModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nouveauModalLabel">Modifier la Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Sélectionnez la permission :</h6>
                    <select id="nouveauPermissionSelect" class="form-control">
                        <!-- Les options seront ajoutées par AJAX -->
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="nouveauUpdateData()">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmation de Suppression -->
<div class="modal fade" id="confirmationSuppressionModal" tabindex="-1" aria-labelledby="confirmationSuppressionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationSuppressionLabel ">Confirmer la Suppression du compte <p id="nomPrenomASupprimer"></p></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet utilisateur ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" onclick="supprimerUtilisateur()">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal pour ajouter un utilisateur-->
<div class="modal fade" id="nouvelUtilisateurModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Ajouter un nouvel utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNouvelUtilisateur">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="structure_id">identifiant de la structure</label>
            <input type="text" class="form-control" id="structure_id" name="structure_id" required>
          </div>
          <div class="form-group">
            <label for="structure_nom">Nom de la structure</label>
            <input type="text" class="form-control" id="structure_nom" name="structure_nom" required>
          </div>
          <div class="form-group">
            <label for="adr">Adresse de la Structure</label>
            <input type="text" class="form-control" id="adr" name="adr" required>
          </div>
          <div class="form-group">
            <label for="mail">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" required>
          </div>
          <div class="form-group">
            <label for="id_perm">Identifiant de la permission (de 1 à 4)</label>
            <input type="text" class="form-control" id="id_perm" name="id_perm" required>
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe(par default)</label>
            <input type="text" class="form-control" id="mdp" name="mdp" required>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>
</div>