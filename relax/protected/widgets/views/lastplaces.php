<?
$lastPlaces = is_object($lastPlaces) ? array($lastPlaces) : $lastPlaces;

foreach($lastPlaces as $place) {
    echo '<div>
        Place '.$place->title.'
    </div>';
}
