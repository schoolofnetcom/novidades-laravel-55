<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Users extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name' => $this->name,
            'email_address' => $this->email,
            'my_articles' => optional($this->posts->first())->title
        ];
    }
}
