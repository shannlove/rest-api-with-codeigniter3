function deleteUser(user_id){
 var bool=confirm("Are you sure that you want to delete this user?");
	if(bool){
		window.location.href="/welcome/delete/"+user_id;
	}
}
