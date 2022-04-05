<?php

class Book {

    // Constants
    const STATUSES = [
        'Read',
        'Currently Reading',
        'To Be Read',
    ];

    //Properties
    public $title;
    public $author;
    public $status;
    public $date_read;
    
    // Relations
    public $user_id;
    public $prompt;
}