<?php
class Helper
{
    public static function star_to_class($star)
    {
		switch($star)
        {
			case 1:
			return 'rate-1';
			break;
			case 2:
			return 'rate-2';
			break;
			case 3:
			return 'rate-3';
			break;
			case 4:
			return 'rate-4';
			break;
			case 5:
			return 'rate-5';
			break;
			default:
			return null;
		}
	}






}