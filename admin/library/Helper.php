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

    public static function order_state_num_to_string($num)
    {
        switch($num)
        {
            case 0:
                return 'Chờ xử lý';
                break;
            case 1:
                return 'Đã hoàn tất';
                break;
            case 2:
                return 'Đã bị hủy';
                break;
            default:
                return 'Lỗi';
        }
    }

    public static function order_state_num_to_class($num)
    {
        switch($num)
        {
            case 0:
                return 'label-primary';
                break;
            case 1:
                return 'label-success';
                break;
            case 2:
                return 'label-danger';
                break;
            default:
                return 'label-warning';
        }
    }






}