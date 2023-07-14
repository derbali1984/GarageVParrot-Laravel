<style>
    .imgAv {
        width: 100px;
        height: auto;
        border-radius: 30%;
    }
</style>

<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{asset('employee_admin_images')}}/{{$user->image}}" class="imgAv" alt="" width="200"></p>
                <p class="badge badge-pill badge-dark">Rôle: {{$user->role->name}}</p>
                <p><b>Nom et prénom: </b>{{$user->name}}</p>
                <p><b>Sexe: </b>{{$user->gender}}</p>
                <p><b>Adresse e-mail: </b>{{$user->email}}</p>
                <p><b>Numéro de téléphone: </b>{{$user->phone_number}}</p>
                <p><b>Adresse: </b>{{$user->address}}</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>