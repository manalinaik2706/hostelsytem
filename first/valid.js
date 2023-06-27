function valid()
{
    var phone_p = document.forms['myform']['pno'];
    var get_num_p = String(phone_p.value).charAt(0);
    var first_num_p = Number(get_num_p);

    var phone_pp = document.forms['myform']['ppno'];
    var get_num_pp = String(phone_pp.value).charAt(0);
    var first_num_pp = Number(get_num_pp);
    
    if( phone_p.value.length != 10 || first_num_p < 6 )  
    {
        alert("Invalid Number Recheck Phone Number !!");
        return false;
    }
    if( phone_pp.value.length != 10 || first_num_pp < 6 )  
    {
        alert("Invalid Number Recheck Parent Phone Number !!");
        return false;
    }
    return true;
}