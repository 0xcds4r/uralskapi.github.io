function executePHPCodeInElement(code, elementName) {
	document.getElementById(elementName).innerHTML = code;
}

function redirect (url) {
    var ua        = navigator.userAgent.toLowerCase(),
        isIE      = ua.indexOf('msie') !== -1,
        version   = parseInt(ua.substr(4, 2), 10);

    // Internet Explorer 8 and lower
    if (isIE && version < 9) {
        var link = document.createElement('a');
        link.href = url;
        document.body.appendChild(link);
        link.click();
    }

    // All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like Internet Explorer 8 & lower does)
    else { 
        window.location.href = url; 
    }
}

function authInWiki()
{
	var log = document.getElementById("adm_log");
	var pass = document.getElementById("adm_pas");
	var hash = "d00040bd58349678a6763459016b5af3";
	redirect('/dev/api/admin/?login=' + log.value + '&pass=' + pass.value + '&hash=' + hash);
}

function removeFunctionFromAPIListUseTitleWeb()
{
    var title_post = document.getElementById("title_post");
    redirect('/dev/api/pages/webhelper/?code=del&name=' + title_post.value + '&key=ZGHAZN389103148515DNF8');
}

function removeFunctionFromAPIListUseTitleSAMP()
{
    var title_post = document.getElementById("title_post");
    redirect('/dev/api/pages/samp/?code=del&name=' + title_post.value + '&key=ZGHAZN389103148515DNF8');
}

function addFuncInAPIListFromPost()
{
    var title_post = document.getElementById("title_post");
    var desc_post = document.getElementById("desc_post");
    var params_post = document.getElementById("params_post");
    var ret_post = document.getElementById("ret_post");
    var exs_post = document.getElementById("exs_post");

    var checkedValueWH = document.getElementById("whcheck");
    var checkedValueSA = document.getElementById("sacheck");

    if(checkedValueWH.checked && checkedValueSA.checked)
    {
        console.log("checkbox fail #1");
        return;
    }

    if(checkedValueWH.checked && checkedValueSA.checked)
    {
        console.log("checkbox fail #2");
        return;
    }

    if(checkedValueWH.checked)
    {
        redirect('/dev/api/pages/webhelper/?code=add&name=' + title_post.value + '&desc=' + desc_post.value + '&params=' + params_post.value + '&ret=' + ret_post.value + '&exs=' + exs_post.value + '&key=ZGHAZN389103148515DNF8');
    }
    else if(checkedValueSA.checked)
    {
        redirect('/dev/api/pages/samp/?code=add&name=' + title_post.value + '&desc=' + desc_post.value + '&params=' + params_post.value + '&ret=' + ret_post.value + '&exs=' + exs_post.value + '&key=ZGHAZN389103148515DNF8');
    }
}

function addAPIPost()
{
	alert('post added!');
}

function file_get_contents( url ) 
    {
        var req = null;
        try { req = new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {
            try { req = new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {
                try { req = new XMLHttpRequest(); } catch(e) {}
            }
        }
        
        if (req == null) throw new Error('XMLHttpRequest not supported');
        req.open("GET", url, false);
        req.send(null);

        return req.responseText;
    }

    function FindAndPasteAPIWeb()
    {
        var title_post = document.getElementById("title_post");
        var save_data = file_get_contents('../pages/webhelper/u/' + title_post.value); 
        if(save_data.includes('404 Not Found') || save_data.includes('403 Forbidden')) save_data = "";

        if(save_data.length > 0) {
            document.getElementById("new_post").value = save_data;
        }
        else
        {
            alert('api function not found!');
        }
    }

    function FindAndPasteAPISAMP()
    {
        var title_post = document.getElementById("title_post");
        var save_data = file_get_contents('../pages/samp/u/' + title_post.value); 
        if(save_data.includes('404 Not Found') || save_data.includes('403 Forbidden')) save_data = "";
        
        if(save_data.length > 0) {
            document.getElementById("new_post").value = save_data;
        }
        else
        {
            alert('api function not found!');
        }
    }

    function IsApiPageExistsInWeb()
    {
        var title_post = document.getElementById("title_post");
        var save_data = file_get_contents('../pages/webhelper/u/' + title_post.value); 
        if(save_data.includes('404 Not Found') || save_data.includes('403 Forbidden')) save_data = "";
        
        if(save_data.length > 0) {
            return true;
        }

        return false;
    }

    function IsApiPageExistsInSAMP()
    {
        var title_post = document.getElementById("title_post");
        var save_data = file_get_contents('../pages/samp/u/' + title_post.value); 
        if(save_data.includes('404 Not Found') || save_data.includes('403 Forbidden')) save_data = "";
        
        if(save_data.length > 0) {
            return true;
        }

        return false;
    }

    function showPageAPIWeb(func)
    {
        document.getElementById(elementName).innerHTML = file_get_contents("u/" + func + "/");
    }

    function insertSpecialChars(type)
    {
        if(type == 0) {
            document.execCommand('insertText', false, '[/n]')
        }

        if(type == 2) {
            document.execCommand('insertText', false, '[p]...[/p]')
        }
    }