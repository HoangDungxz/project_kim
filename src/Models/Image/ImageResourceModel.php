<?php

namespace SRC\Models\Image;

use SRC\Core\ResourceModel;

class ImageResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("productimages", "id", new ImagesModel());
    }
}
