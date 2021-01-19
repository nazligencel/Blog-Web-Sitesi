<?php
function checkInput($var)
{
    return stripcslashes(trim(htmlspecialchars($var)));
}

function kayitlimi($id)
{
    global $baglan;
    $kontrol=$baglan->prepare("SELECT id FROM blog WHERE id=?");
    $kontrol->execute(array($id));
    if ($kontrol->rowCount())
    {
        return true;
    }
    else
    {
        return false;
    }
}
function OturumAcikmi()
{
    return (isset($_SESSION['admin'])) ? true : false;
}
?>