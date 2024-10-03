<script>
    // IMPORTS
  import { Router, Route } from 'svelte-routing';
  import { BACK_PATH, BASE_PATH} from "./lib/js/stores/stores.js";
  import { writable, get } from 'svelte/store';
  import { GetAppName } from './lib/js/utilities/app.js';

  import One from './lib/svelte/pages/One.svelte';
  import Two from './lib/svelte/pages/Two.svelte';

  const isDev = import.meta.env.MODE;  

  if(isDev == 'development')
  {
    BASE_PATH.set('/client/dist');
    BACK_PATH.set('http://localhost'); // << - - - SET YOUR DEV URL HERE    
  }
  else
  {
    BASE_PATH.set('');
    BACK_PATH.set(window.location.origin); // << - - - SET YOUR PROD URL HERE    
  }

  let BASE_PATH_ = get(BASE_PATH);

  GetAppName();

  const routes = [
    { path: `${BASE_PATH_}/`, component: One },
    { path: `${BASE_PATH_}/two`, component: Two },
  ];
</script>

<Router>
  {#each routes as { path, component }}
    <Route {path} let:params>
        <svelte:component this={component} {...params} />
    </Route>
  {/each}
</Router>