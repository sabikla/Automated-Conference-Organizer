<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['registration'] = 'registration';
$route['verifylogin'] = 'verifylogin';
$route['resetPassword'] = 'resetPassword';
$route['resetPassword/setNewPassword'] = 'resetPassword/setNewPassword';
$route['resetPassword/(:any)'] = 'resetPassword/resetMyPassword/$1';
$route['createUser'] = 'createUser';
$route['ajaxApi/(:any)/(:any)'] = 'ajaxApi/index/$1/$2';
$route['adminarea/logout'] = 'adminarea/logout';
$route['adminarea/setNews'] = 'adminarea/setNews';
$route['adminarea/setMessage'] = 'adminarea/setMessage';
$route['adminarea/setReviewer'] = 'adminarea/setReviewer';
$route['adminarea/setCommittee'] = 'adminarea/setCommittee';
$route['adminarea/setTrack'] = 'adminarea/setTrack';
$route['adminarea/postponeDate'] = 'adminarea/postponeDate';
$route['adminarea/setAboutContent'] = 'adminarea/setAboutContent';
$route['adminarea/setMemberToCommittee'] = 'adminarea/setMemberToCommittee';
$route['adminarea/setDate'] = 'adminarea/setDate';
$route['adminarea/setPaperForReview'] = 'adminarea/setPaperForReview';
$route['adminarea/deleteItem/(:any)/(:any)'] = 'adminarea/deleteItem/$1/$2';
$route['adminarea/doActionOnAbstract/(:any)/(:any)'] = 'adminarea/doActionOnAbstract/$1/$2';
$route['adminarea/doActionOnFullPaper/(:any)/(:any)'] = 'adminarea/doActionOnFullPaper/$1/$2';
$route['adminarea/doActionOnCamerapaper/(:any)/(:any)'] = 'adminarea/doActionOnCamerapaper/$1/$2';
$route['adminarea/userProfile/(:any)'] = 'adminarea/loadUserProfile/$1';
$route['adminarea/(:any)/(:any)'] = 'adminarea/view/$1/$2';
$route['adminarea/(:any)'] = 'adminarea/view/$1';
$route['userarea/logout'] = 'userarea/logout';
$route['userarea/postPaper'] = 'userarea/postPaper';
$route['userarea/addPaymentInfo'] = 'userarea/addPaymentInfo';
$route['userarea/doActionOnAbstract/(:any)/(:any)'] = 'userarea/doActionOnAbstract/$1/$2';
$route['userarea/doActionOnFullpaper/(:any)/(:any)'] = 'userarea/doActionOnFullpaper/$1/$2';
$route['userarea/doActionOnCamerapaper/(:any)/(:any)'] = 'userarea/doActionOnCamerapaper/$1/$2';
$route['userarea/(:any)'] = 'userarea/view/$1';
$route['reviewerarea/postReview/(:any)'] = 'reviewerarea/postReview/$1';
$route['reviewerarea/reviewInDetail/(:any)'] = 'reviewerarea/reviewInDetail/$1';
$route['reviewerarea/doAction/(:any)/(:any)/(:any)'] = 'reviewerarea/doAction/$1/$2/$3';
$route['reviewerarea/setReview'] = 'reviewerarea/setReview';
$route['reviewerarea/(:any)'] = 'reviewerarea/view/$1';
$route['reviewerarea/logout'] = 'reviewerarea/logout';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';/**/

/* End of file routes.php */
/* Location: ./application/config/routes.php */