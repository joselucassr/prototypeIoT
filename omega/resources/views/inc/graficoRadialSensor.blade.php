<script>
    var bar = new ProgressBar.SemiCircle('#sensor{{$sensor -> id_sensor}}', {
        strokeWidth: 6,
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '',
            alignToBottom: true
        },
        from: {color: '#43bae6'},
        to: {color: '#ff1800'},
        // Set default step function for all animate calls
        step: (state, bar) => {
            bar.path.setAttribute('stroke', state.color);
            var value = Math.round(bar.value() * 100);
            if (value === 0) {
                bar.setText('');
            } else {
                bar.setText(value - 30 + " °C");
            }

            bar.text.style.color = state.color;
        }
    });
    bar.text.style.fontFamily = '"Roboto", sans-serif';
    bar.text.style.fontSize = '3.5rem';

    bar.animate({{0.3 + (($sensor -> temperatura) / 100)}});  // Number from 0.0 to 1.0 // VAI DE -30 a +70

</script>