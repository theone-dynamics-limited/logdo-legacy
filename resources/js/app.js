import './bootstrap';

Echo.channel('logdo').listen('LogSaved', (e) => {
    console.log(e.log);
    window.livewire.emit('logSaved', e.log)
});