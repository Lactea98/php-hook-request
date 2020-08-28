function create_url($this){
    $this.innerText = "Wait a second..";
    
    fetch("/createurl",{
        method: "POST",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({"create_url" : "1"})
    })
    .then(function(res){
        return res.json();
    })
    .then(function(res){
        location.href=res["output"];
    })
}

// function details(a){
//     let $handle = $(a).parent().find(".receive-details-packet");
    
//     if ($handle.html() == ""){
        
//     }
//     else{
//         $handle.slideToggle(function(){
//             let data = $handle.html();
//             let prev = $(a).parent().find("media-body").html();
//             $(a).parent().find(".media-body").html(prev + data);
            
//         });
//     }
// }


function received_data(data){
    // let html = `<div class="media text-muted pt-3">
    //                 <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
    //                 <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
    //                     <strong class="d-block text-gray-dark receive-ip">{{request_ip}}</strong>
    //                     {{simple}}
    //                     <div class="receive-details-packet" style="display: none">{{detail}}</div>
    //                 </p>
    //                 <button class="show-details"  onclick="details(this);">show details</button>
    //             </div>`;
    let html = `<div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark receive-ip">{{request_ip}}</strong>
                        {{detail}}
                    </p>
                </div>`;
    let detail = '';
    
    for(var key in data){
        if(key == "ip" || key == "uri"){
            continue;
        }
        if(key == "0"){
            detail += data[key] + "<br>";
            continue;
        }
        detail += key+": "+data[key] + "<br>";
    }
    html = html.replace("{{request_ip}}", data["ip"]);
    html = html.replace("{{detail}}", detail);
                
                
    // let simple = '';
    // let detail = '';
    
    // simple = data["0"] + "<br>"
    // for(var key in data){
    //     if(key == "0" || key == "ip" || key == "uri"){
    //         continue;
    //     }
    //     detail += key+": "+data[key] + "<br>";
    // }
    // html = html.replace("{{request_ip}}", data["ip"]);
    // html = html.replace("{{simple}}", simple);
    // html = html.replace("{{detail}}", detail);
    
    $(".receive-result").append(html);
}

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
        
var pusher = new Pusher(config["pusher"], {
    cluster: 'ap3'
});
        
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    if(data["message"]["uri"] == window.location.pathname){
        received_data(data["message"]);   
    }
});