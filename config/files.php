<?php

return [
    /**
     * Maximum image size that will be uploaded in kilobytes.
     */
    'max_image_size' => env('MAX_UPLOAD_IMAGE_SIZE', 1024),

    /**
     * Path to product images directory, relative to the storage folder.
     */
    'book_image_dir' => env('BOOK_IMAGE_DIR', 'img/books'),
];
