<div class="modal fade" id="exampleModal{{$vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExample{{$vehicle->id}}" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach (explode(',', $vehicle->image) as $index => $imageName)
                        <li data-target="#carouselExample{{$vehicle->id}}" data-slide-to="{{$index}}" @if ($index==0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach (explode(',', $vehicle->image) as $index => $imageName)
                        <div class="carousel-item @if ($index == 0) active @endif">
                            <img src="{{ asset('vehicles_images/' . $imageName) }}" style="width: 100%; height: 600px;" alt="">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample{{$vehicle->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample{{$vehicle->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br>
                <p>
                    <b>Marque et Modéle: </b>{{$vehicle->brand}} {{$vehicle->model}}
                </p>

                <p>
                    <b>Description: </b>{{$vehicle->description}}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>