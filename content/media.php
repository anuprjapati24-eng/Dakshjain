<?php
/**
 * Media coverage and public appearances shown on media.php, newest first.
 * Add verified items only. Each record:
 *
 *   'title'      required; a verified headline or a concise factual caption
 *   'category'   required; one of the section titles listed in media.php
 *   'summary'    short description
 *   'date'       as it should be displayed; omit if not confirmed
 *   'source'     publication, channel or organiser
 *   'url'        working source link
 *   'link_label' optional; defaults to "View"
 *   'image'      optional; a .jpg under assets/images/ shown with the item
 *   'image_alt'  optional; alt text for the image (defaults to the title)
 */
return [
    [
        'title'      => 'Aerodrome Advisory Committee meeting, Surat International Airport',
        'category'   => 'Public Events',
        'date'       => '12 September 2025',
        'event'      => 'High-Level Aerodrome Advisory Committee (AAC) Meeting',
        'venue'      => 'Conference Hall, Terminal Building, Surat Airport',
        'summary'    => 'Daksh Jain attended as a member nominated by the Ministry of Civil Aviation. The meeting, chaired by Shri C. R. Paatil, Cabinet Minister of Jal Shakti, discussed airport development, infrastructure, future expansion and passenger facilities.',
        'url'        => 'https://www.instagram.com/reel/DRfSAANEh4W/',
        'link_label' => 'Watch on Instagram',
        'image'      => 'assets/images/reels/aac-surat-airport.jpg',
        'image_alt'  => 'Video cover: the Airport Advisory Committee Meeting banner at Surat International Airport above the meeting table',
    ],
    [
        'title'      => 'Daksh Jain nominated as Member TAC in MoC, GOI',
        'category'   => 'News and Press Coverage',
        'date'       => '6 February 2021',
        'source'     => 'Top Story, Delhi',
        'summary'    => 'Report on the Ministry of Communications, Government of India, nominating Daksh Jain for a second time as a member of the Telecom Advisory Committee (TAC). He was first nominated in 2017.',
        'url'        => 'assets/images/press/top-story-2021-02-06.jpg',
        'link_label' => 'View clipping',
        'image'      => 'assets/images/press/top-story-2021-02-06.jpg',
        'image_alt'  => 'Top Story newspaper clipping with a photograph of Daksh Jain and the headline about his TAC nomination',
    ],
    [
        'title'      => 'Daksh Jain nominated to the Telecom Advisory Committee for the second time',
        'category'   => 'News and Press Coverage',
        'date'       => '1 February 2021',
        'source'     => 'Rashtriya Sahara, New Delhi (Hindi)',
        'summary'    => 'Hindi-language report on his second nomination to the Telecom Advisory Committee by the Ministry of Communications, noting the issues he raised during his previous term.',
        'url'        => 'assets/images/press/rashtriya-sahara-2021-02-01.jpg',
        'link_label' => 'View clipping',
        'image'      => 'assets/images/press/rashtriya-sahara-2021-02-01.jpg',
        'image_alt'  => 'Rashtriya Sahara newspaper clipping with a Hindi headline about Daksh Jain’s TAC nomination',
    ],
    [
        'title'      => 'Daksh Jain nominated to a Ministry of Communications committee',
        'category'   => 'News and Press Coverage',
        'source'     => 'Punjabi Tribune, Delhi | Haryana (Punjabi)',
        'summary'    => 'Punjabi-language report on his nomination to the Telecom Advisory Committee of the Ministry of Communications.',
        'url'        => 'assets/images/press/punjabi-tribune-tac.jpg',
        'link_label' => 'View clipping',
        'image'      => 'assets/images/press/punjabi-tribune-tac.jpg',
        'image_alt'  => 'Punjabi Tribune newspaper clipping with a Punjabi headline about Daksh Jain’s nomination',
    ],
];
