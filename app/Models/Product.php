<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public const IMAGE_PATH = 'public/products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'price',
        'status',
    ];

    /**
     * Get the image attribute.
     *
     * @return string
     */
    protected $appends = [
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'status' => 'boolean',
        ];
    }

    
    public function setImageAttribute($image)
    {
        if ($image) {
            if (is_string($image)) {
                // Jika image adalah string nama file
                $filename = $image;
            } else {
                // Jika image adalah objek file
                $filename = self::_generateUploadFilename($image, 'product');
                if (isset($this->attributes['image'])) {
                    Storage::delete(self::IMAGE_PATH . '/' . $this->attributes['image']);
                }
                Storage::putFileAs(self::IMAGE_PATH, $image, $filename);
            }
            $this->attributes['image'] = $filename;
        }
    }

    public function getImageAttribute(): string
    {
        $defaultImage = asset('images/profile/user-1.jpg');

        return $this->attributes['image'] ? Storage::url(self::IMAGE_PATH. '/' .$this->attributes['image']) : $defaultImage;
    }

    public static function _generateUploadFilename($file, $type)
    {
        $ext = $file->getClientOriginalExtension();

        return $type . '_' . time() . '.' . $ext;
    }
}
