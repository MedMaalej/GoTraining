<?php /**
 * Header Redirect
 *
 * Header redirect in two flavors
 * For very fine grained control over headers, you could use the Output
 * Library's set_header() function.
 *
 * @access  public
 * @param   string  the URL
 * @param   string  the method: location or redirect
 * @return  string
 */
if ( ! function_exists('redirect'))
{
    function redirect($uri = '', $method = 'location', $http_response_code = 302)
    {
        if ( ! preg_match('#^https?://#i', $uri))
        {
            $uri = site_url($uri);
        }
                 
        $CI = &get_instance();
        if($CI->input->is_ajax_request()) {
            echo '<script language="javascript">location.href="'.$uri.'"</script>';
            exit;
        }
 
        switch($method)
        {
            case 'refresh'  : header("Refresh:0;url=".$uri);
                break;
            default         : header("Location: ".$uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }
}
?>