<?php

// use Darryldecode\Cart\Cart;

function cardArray()
{
    $cartcollection = \Cart::getContent();
    return $cartcollection->toArray();
}