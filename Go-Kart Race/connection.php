<?php


if(!$link = mysqli_connect('localhost', 'root' , '', 'go-kart race'))
{

	die("Couldn't connect to the database");
}
