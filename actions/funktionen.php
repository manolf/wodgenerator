<?php

function getColourDifficulty($difficulty)
{

    $cat = 'dark';


    switch ($difficulty) {
        case 'easy':
            $cat = 'var(--clr-easy)';
            break;
        case 'intermediate':
            $cat = 'var(--clr-medium)';
            break;
        case 'hard':
            $cat = 'var(--clr-hard)';
            break;
        case 'crossfit':
            $cat = 'var(--clr-cf)';
            break;
        default:
            $cat = 'var(--clr-footer)';
    }

    return $cat;
}

function getWodPicture($equiSetId)
{
    switch ($equiSetId) {
        case 1:
            $pic = '../images/icon/jumping-jacks.png';
            $pic_style = "width: 158px; height: 195px";
            break;
        case 2:
            $pic = '../images/icon/pull-up.png';
            $pic_style = "width: 98px; height: 200px";
            break;
        case 3:
            $pic = '../images/icon/boxjump.png';
            $pic_style = "width: 195px; height: 199px";
            break;
        case 4:
            $pic = '../images/icon/ringrows.png';
            $pic_style = "width: 268px; height: 200px";
            break;
        case 5:
            $pic = '../images/icon/dumbbell.png';
            $pic_style = "width: 160px; height: 199px";
            break;
        case 6:
            $pic = '../images/icon/snatch.png';
            $pic_style = "width: 105px; height: 200px";
            break;
        case 7:
            $pic = '../images/icon/band.jpg';
            $pic_style = "width: 199px; height: 199px";
            break;
        case 8:
            $pic = '../images/icon/deadlift.png';
            $pic_style = "width: 183px; height: 200px";
            break;
        case 9:
            $pic = '../images/icon/wallballshot.png';
            $pic_style = "width: 152px; height: 200px";
            break;
        case 10:
            $pic = '../images/icon/DU.png';
            $pic_style = "width: 146px, height:200px";
            break;
        default:
            $pic = '../images/icon/multi.png';
            $pic_style = "width: 211px, height:200px";
    }

    return $pic;
}

function getWodPictureStyle($equiSetId)
{
    switch ($equiSetId) {
        case 1:
            $pic = '../images/icon/jumping-jacks.png';
            $pic_style = "width: 158px; height: 195px";
            break;
        case 2:
            $pic = '../images/icon/pull-up.png';
            $pic_style = "width: 98px; height: 200px";
            break;
        case 3:
            $pic = '../images/icon/boxjump.png';
            $pic_style = "width: 195px; height: 199px";
            break;
        case 4:
            $pic = '../images/icon/ringrows.png';
            $pic_style = "width: 268px; height: 200px";
            break;
        case 5:
            $pic = '../images/icon/dumbbell.png';
            $pic_style = "width: 160px; height: 199px";
            break;
        case 6:
            $pic = '../images/icon/snatch.png';
            $pic_style = "width: 105px; height: 200px";
            break;
        case 7:
            $pic = '../images/icon/band.jpg';
            $pic_style = "width: 199px; height: 199px";
            break;
        case 8:
            $pic = '../images/icon/deadlift.png';
            $pic_style = "width: 183px; height: 200px";
            break;
        case 9:
            $pic = '../images/icon/wallballshot.png';
            $pic_style = "width: 152px; height: 200px";
            break;
        case 10:
            $pic = '../images/icon/DU.png';
            $pic_style = "width: 146px, height:200px";
            break;
        default:
            $pic = '../images/icon/multi.png';
            $pic_style = "width: 211px, height:200px";
    }

    return $pic_style;
}

function getStars($input)
{

    $rating = $input;

    // $stars = "<span class='empty'>★ ★ ★ ★ ★</span>";

    switch ($rating) {
        case ($rating < 1):
            //$stars = "0";
            $stars = "<span class='empty'>★ ★ ★ ★ ★</span>";
            break;
        case ($rating < 2):
            // $stars = "1";
            $stars = "<span class='filled'>★</span><span class='empty'> ★ ★ ★ ★</span> ";
            break;
        case (($rating >= 2) && ($rating < 3)):
            // $stars = "2";
            $stars = "<span class='filled'>★ ★</span><span class='empty'> ★ ★ ★</span> ";
            break;
        case (($rating >= 3) && ($rating < 4)):
            $stars = "<span class='filled'>★ ★ ★</span><span class='empty'> ★ ★</span> ";
            break;
        case (($rating >= 4) && ($rating < 5)):
            $stars = "<span class='filled'>★ ★ ★ ★</span><span class='empty'> ★</span> ";
            break;
        case ($rating >= 5):
            $stars = "<span class='filled'>★ ★ ★ ★ ★</span>";
            break;
        default:
            $stars = "<span class='empty'>★ ★ ★ ★ ★ </span>";
    }

    return $stars;
}
