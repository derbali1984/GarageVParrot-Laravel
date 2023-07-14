<style>
    .imgAv {
        width: 100px;
        height: auto;
        border-radius: 30%;
    }
</style>

<div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{asset('services_images')}}/{{$service->image}}" class="imgAv" alt="" width="200"></p>
                <p>
                    <b>Nom: </b>{{$service->name}}
                </p>
                <p>
                    <b>Description: </b>{{$service->description}}
                </p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>