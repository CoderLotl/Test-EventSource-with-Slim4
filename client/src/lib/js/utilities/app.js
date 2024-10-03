import { DataAccessFetch } from "../services/DataAccessFetch.js";
import { BACK_PATH, APP_NAME } from "../stores/stores.js";
import { writable, get } from 'svelte/store';

let dataAccess = new DataAccessFetch();

export async function GetAppName()
{
    let BACK_PATH_ = get(BACK_PATH);
    let serverResponse = await dataAccess.getData(`${BACK_PATH_}` + '/app_name', null, true);

    if(serverResponse)
    {
        let resp = await serverResponse.json();        
        APP_NAME.set(resp['response']);        
    }
}

export async function RunEventSource(URL, elementID, eventName = null)
{
    let BACK_PATH_ = get(BACK_PATH);
    let source = new EventSource(`${BACK_PATH_}` + URL);

    // WORKS, but doesn't work on event name.
    if(eventName)
    {
        source.addEventListener(eventName, (e)=>
        {
            document.getElementById(elementID).innerHTML += e.data + "<br>";    
        });        
    }
    else
    {        
        // WORKS with event names.
        source.onmessage = function(e)
        {
            document.getElementById(elementID).innerHTML += e.data + "<br>";        
        }
    }

    return source;
}