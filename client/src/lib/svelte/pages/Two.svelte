<script>
    import { onMount, onDestroy, tick } from 'svelte';
    import { navigate } from 'svelte-routing';
    import { get } from 'svelte/store';
    import { APP_NAME, BASE_PATH } from "../../js/stores/stores.js";
    import { RunEventSource } from "../../js/utilities/app.js";
    import Main from '../components/Main.svelte';

    $: APP_NAME_ = $APP_NAME;
    let eventSource;

    function Navigate(event)
    {
        event.preventDefault();
        let BASE_PATH_ = get(BASE_PATH);
        navigate(`${BASE_PATH_}` + '/');
    }

    onMount(async ()=>
    {
        await tick();
        eventSource = await RunEventSource('/event_two', 'panel');
    });

    onDestroy(() =>
    {
        if(eventSource)
        {
            eventSource.close();
        }
    });
</script>

<svelte:head>
    <title>{APP_NAME_} - Home</title>
</svelte:head>

<Main>
    <button class="bg-slate-300 mt-[15%] p-[10px] rounded-lg" on:click={Navigate}>
        To One
    </button>
    <div id="panel" class="bg-white w-[50%] h-[50%] mt-[1%] p-[10px] rounded-md overflow-hidden">
        Data:<br>
    </div>
</Main>