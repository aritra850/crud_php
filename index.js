function setError(id,error){
    let element = document.getElementById(id).innerHTML=error;
}

function checkname(name){
    if(name.length==0)
    {
        setError("errorname","*OOPS!...YOU FORGET TO ENTER YOUR NAME");
        return false;
    }
    else{
        for(let i=0;i<name.length;i++){
            if(name.charCodeAt(i)<65 || name.charCodeAt(i)>90)
            {
                if(name[i]!=" ")
                {
                    setError("errorname","*WRONG INPUT...ENTER NAME PROPERLY");
                    return false;
                }
            }

        }
        return true;
    }
}

function checkphone(phone)
{
    if(phone.length!=10)
    {
        setError("errorphone","*MOBILE NUMBER IS TOO SHORT");
        return false;
    }
    for(let i=0;i<phone.length;i++)
    {
        if(phone.charCodeAt(i)<48 || phone.charCodeAt(i)>57)
        {
            setError("errorphone","*ENTER A PROPER MOBILE NUMBER...");
            return false;
        }
    }
    return true;
}

function checkdept(dept){
    for(let i=0;i<dept.length;i++){
        if(dept.charCodeAt(i)<65 || dept.charCodeAt(i)>90){
            if(dept[i]!='.' && dept[i]!=" ")
            {
                setError("errordept","*WRONG INPUT....ENTER DEPERTMENT NAME PROPERLY");
                return false;
            }
        }
    }
    return true;
}

function checkclass(clas){
    for(let i=0;i<clas.length;i++){
        if(clas.charCodeAt(i)<65 || clas.charCodeAt(i)>90 ){
            if(clas.charCodeAt(i)<48 || clas.charCodeAt(i)>57){
                if(clas[i]!=" " && clas[i]!="."){
                    setError("errorclass","*WRONG INPUT...ENTER CLASS NAME PROPERLY");
                    return false;
                }
            }
        }
    }
    return true;
}

function validateForm(){
    let validate=true;
    let name = document.forms['form']["name"].value;
    let dept = document.forms['form']["dept"].value;
    let clas = document.forms['form']["class"].value;
    let phone = document.forms['form']["phone"].value;

    //NAME:-
    validate=checkname(name);
    let elename = document.getElementById("name");
    if(validate==false)
    {
        elename.style.border="2px solid red";
    }
    else{
        elename.style.border="2px solid black"
        document.getElementById('errorname').innerHTML="";
    }

    //DEPT:-
    if(validate==true){
        validate=checkdept(dept);
    
        let eledept = document.getElementById("dept");
        if(validate==false)
        {
            eledept.style.border="2px solid red";
        }
        else{
            eledept.style.border="2px solid black"
            document.getElementById('errordept').innerHTML="";
        }
    }

    //CLASS:-
    if(validate==true){
        validate=checkclass(clas);
    
        let eleclass = document.getElementById("class");
        if(validate==false)
        {
            eleclass.style.border="2px solid red";
        }
        else{
            eleclass.style.border="2px solid black"
            document.getElementById('errorclass').innerHTML="";
        }
    }

    //PHONE:-
    if(validate==true){
        validate=checkphone(phone);
    
        let elephone = document.getElementById("phone");
        if(validate==false)
        {
            elephone.style.border="2px solid red";
        }
        else{
            elephone.style.border="2px solid black"
            document.getElementById('errorphone').innerHTML="";
        }
    }

    return validate;
}