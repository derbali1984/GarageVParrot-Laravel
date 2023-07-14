<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image'

    ];

    public function serviceIMG($request)
    {
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/services_images');
        $image->move($destination, $name);
        return $name;
    }
}
