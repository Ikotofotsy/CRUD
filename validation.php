<?php

function valideName($name)
{
    if(preg_match("/^[A-Z]+$/", $name))
        return $name;
    else 
        return NULL;
}

function valideLastName($name)
{
    if(preg_match("/^[A-Za-z\s]+$/", $name))
        return $name;
    else 
        return NULL;
}

function valideAge($age)
{
    if(is_numeric($age) && $age>0 && strlen($age)<= 3)
        return $age;
    else
        return NULL;
}

function validePhone($phone)
{
    if(is_numeric($phone) && $phone > 0 && strlen($phone) == 10)
        return $phone;
    else return NULL;
}