<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            ]);
        } else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
    }

    public function chartsAction(Request $request, $country)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $countries = array (
                'BD' => 'Bangladesh',
                'BE' => 'Belgium',
                'BF' => 'Burkina%20Faso',
                'BG' => 'Bulgaria',
                'BA' => 'Bosnia%20and%20Herzegovina',
                'BN' => 'Brunei',
                'BO' => 'Bolivia',
                'JP' => 'Japan',
                'BI' => 'Burundi',
                'BJ' => 'Benin',
                'BT' => 'Bhutan',
                'JM' => 'Jamaica',
                'BW' => 'Botswana',
                'BR' => 'Brazil',
                'BS' => 'Bahamas',
                'BY' => 'Belarus',
                'BZ' => 'Belize',
                'RU' => 'Russian%20Federation',
                'RW' => 'Rwanda',
                'RS' => 'Serbia',
                'TL' => 'Timor-Leste',
                'TM' => 'Turkmenistan',
                'TJ' => 'Tajikistan',
                'RO' => 'Romania',
                'GW' => 'Guinea-Bissau',
                'GT' => 'Guatemala',
                'GR' => 'Greece',
                'GQ' => 'Equatorial%20Guinea',
                'GY' => 'Guyana',
                'GE' => 'Georgia',
                'GB' => 'United%20Kingdom',
                'GA' => 'Gabon',
                'GN' => 'Guinea',
                'GM' => 'Gambia',
                'GL' => 'Greenland',
                'GH' => 'Ghana',
                'OM' => 'Oman',
                'TN' => 'Tunisia',
                'JO' => 'Jordan',
                'HR' => 'Croatia',
                'HT' => 'Haiti',
                'HU' => 'Hungary',
                'HN' => 'Honduras',
                'PR' => 'Puerto%20Rico',
                'PS' => 'Palestine',
                'PT' => 'Portugal',
                'PY' => 'Paraguay',
                'PA' => 'Panama',
                'PG' => 'Papua%20New%20Guinea',
                'PE' => 'Peru',
                'PK' => 'Pakistan',
                'PH' => 'Philippines',
                'PL' => 'Poland',
                'ZM' => 'Zambia',
                'EH' => 'Western%20Sahara',
                'EE' => 'Estonia',
                'EG' => 'Egypt',
                'ZA' => 'South%20Africa',
                'EC' => 'Ecuador',
                'IT' => 'Italy',
                'VN' => 'Vietnam',
                'SB' => 'Solomon%20Islands',
                'ET' => 'Ethiopia',
                'SO' => 'Somalia',
                'ZW' => 'Zimbabwe',
                'ES' => 'Spain',
                'ER' => 'Eritrea',
                'ME' => 'Montenegro',
                'MD' => 'Moldova',
                'MG' => 'Madagascar',
                'MA' => 'Morocco',
                'UZ' => 'Uzbekistan',
                'MM' => 'Myanmar',
                'ML' => 'Mali',
                'MN' => 'Mongolia',
                'MK' => 'Macedonia',
                'MW' => 'Malawi',
                'MR' => 'Mauritania',
                'UG' => 'Uganda',
                'MY' => 'Malaysia',
                'MX' => 'Mexico',
                'IL' => 'Israel',
                'FR' => 'France',
                'FI' => 'Finland',
                'FJ' => 'Fiji',
                'FK' => 'Falkland%20Islands',
                'NI' => 'Nicaragua',
                'NL' => 'Netherlands',
                'NO' => 'Norway',
                'NA' => 'Namibia',
                'VU' => 'Vanuatu',
                'NC' => 'New%20Caledonia',
                'NE' => 'Niger',
                'NG' => 'Nigeria',
                'NZ' => 'New%20Zealand',
                'NP' => 'Nepal',
                'XK' => 'Kosovo',
                'CI' => 'Cote-d-Ivoire',
                'CH' => 'Switzerland',
                'CO' => 'Colombia',
                'CN' => 'China',
                'CM' => 'Cameroon',
                'CL' => 'Chile',
                'XC' => 'N.Cyprus',
                'CA' => 'Canada',
                'CG' => 'Congo',
                'CF' => 'Central%20African%20Republic',
                'CD' => 'Dem%20Rep%20of%20Congo',
                'CZ' => 'Czech%20Republic',
                'CY' => 'Cyprus',
                'CR' => 'Costa%20Rica',
                'CU' => 'Cuba',
                'SZ' => 'Swaziland',
                'SY' => 'Syria',
                'KG' => 'Kyrgyzstan',
                'KE' => 'Kenya',
                'SS' => 'South%20Sudan',
                'SR' => 'Suriname',
                'KH' => 'Cambodia',
                'SV' => 'El%20Salvador',
                'SK' => 'Slovakia',
                'KR' => 'Rep%20of%20Korea',
                'SI' => 'Slovenia',
                'KP' => 'Dem%20Peoples%20Rep%20of%20Korea',
                'KW' => 'Kuwait',
                'SN' => 'Senegal',
                'SL' => 'Sierra%20Leone',
                'KZ' => 'Kazakhstan',
                'SA' => 'Saudi%20Arabia',
                'SE' => 'Sweden',
                'SD' => 'Sudan',
                'DO' => 'Dominican%20Republic',
                'DJ' => 'Djibouti',
                'DK' => 'Denmark',
                'DE' => 'Germany',
                'YE' => 'Yemen',
                'DZ' => 'Algeria',
                'US' => 'United%20States',
                'UY' => 'Uruguay',
                'LB' => 'Lebanon',
                'LA' => 'Lao%20PDR',
                'TW' => 'Taiwan',
                'TT' => 'Trinidad%20and%20Tobago',
                'TR' => 'Turkey',
                'LK' => 'Sri%20Lanka',
                'LV' => 'Latvia',
                'LT' => 'Lithuania',
                'LU' => 'Luxembourg',
                'LR' => 'Liberia',
                'LS' => 'Lesotho',
                'TH' => 'Thailand',
                'TF' => 'Fr.S.AntarcticLands',
                'TG' => 'Togo',
                'TD' => 'Chad',
                'LY' => 'Libya',
                'AE' => 'United%20Arab%20Emirates',
                'VE' => 'RB-de-Venezuela',
                'AF' => 'Afghanistan',
                'IQ' => 'Iraq',
                'IS' => 'Iceland',
                'IR' => 'Islamic%20Republic%20of%20Iran',
                'AM' => 'Armenia',
                'AL' => 'Albania',
                'AO' => 'Angola',
                'AR' => 'Argentina',
                'AU' => 'Australia',
                'AT' => 'Austria',
                'IN' => 'India',
                'TZ' => 'Tanzania',
                'AZ' => 'Azerbaijan',
                'IE' => 'Ireland',
                'ID' => 'Indonesia',
                'UA' => 'Ukraine',
                'QA' => 'Qatar',
                'MZ' => 'Mozambique',
            );
            $now = new \DateTime();
            $string = file_get_contents("http://api.population.io:80/1.0/population/".$countries[$country]."/".$now->format("Y-m-d"));
            $population=json_decode($string,true);

            $string = file_get_contents("http://api.population.io:80/1.0/mortality-distribution/".$countries[$country]."/female/5y/today");
            $mortalityDistributionFemale = json_decode($string,true);

            $string = file_get_contents("http://api.population.io:80/1.0/mortality-distribution/".$countries[$country]."/male/5y/today");
            $mortalityDistributionMale = json_decode($string,true);

            $string = file_get_contents("http://api.population.io:80/1.0/life-expectancy/total/female/".$countries[$country]."/1990-01-01");
            $lifeExpectancyFemale = json_decode($string,true);

            $string = file_get_contents("http://api.population.io:80/1.0/life-expectancy/total/male/".$countries[$country]."/1990-01-01");
            $lifeExpectancyMale = json_decode($string,true);


            $beautiful = str_replace("%20"," ",$countries[$country]);
            return $this->render('charts/country.html.twig', array(
                'country' => $beautiful,
                'population' => $population,
                'mortalityDistributionFemale' => $mortalityDistributionFemale,
                'mortalityDistributionMale' => $mortalityDistributionMale,
                'lifeExpectancyFemale' => $lifeExpectancyFemale,
                'lifeExpectancyMale' => $lifeExpectancyMale,
            ));
        } else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
    }
}
