<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Truck Dashboard</title>

<style>

{!! $panel->css !!}

</style>
</head>

<body>

<h1 onclick="toggleFullScreen()">Painel</h1>

{!! $panel->html !!}
{{-- <script>

const socket = new WebSocket(`ws://${location.host}/ws`);

function setStatus(id,value){
    const el=document.getElementById(id);

    if(value=="1"){
        el.classList.remove("off");
        el.classList.add("active");
        el.innerText="ON";
    }else{
        el.classList.remove("active");
        el.classList.add("off");
        el.innerText="OFF";
    }
}

socket.onmessage = (event) => {

    let data = JSON.parse(event.data);

    let raw = data.game;
    let sensors = data.hwdata;
    
    let obj = {};
    let objSensor = {};

    raw.split(";").forEach(item=>{
        let [key,value]=item.split(":");
        obj[key]=value;
    });

    if(sensors != "") {
        sensors.split(",").forEach(item=>{
            let [key,value]=item.split(":");
            objSensor[key]=value;
            
            console.log(value + " " + key);
        });    
        
        if(cpuTemp > 40) {
            document.getElementById("cpuTemp").innerHTML=`<span style="color: red;">${objSensor.CPU_TEMP}</span>`;
        } else {
            document.getElementById("cpuTemp").innerHTML=`<span style="color: green;">${objSensor.CPU_TEMP}</span>`;
        }
    }

    document.getElementById("speed").innerText=obj.speed;
    document.getElementById("fuel").innerText=obj.fuel+"%";
    document.getElementById("gear").innerText=obj.gear;

    setStatus("engine",obj.engine);
    setStatus("eletric",obj.eletric);
    setStatus("pbreake",obj.pbreake);

    setStatus("lblink",obj.lblink);
    setStatus("rblink",obj.rblink);

    setStatus("hazard",obj.hazard);

    setStatus("hbeam",obj.hbeam);
    setStatus("lbeam",obj.lbeam);

};

function toggleFullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

</script> --}}

</body>
</html>