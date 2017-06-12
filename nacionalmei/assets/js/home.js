var rel1 = new Chart(document.getElementById("rel1"), {
    type: 'bar',
    data: {
        labels: days_list,
        datasets: [{
            label: 'Aulas assistidas',
            data: days_watched,
            backgroundColor: [
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)',
                'rgba(33,150,243,1)'
            ]
        }]
    },
    options: {
        scales: {yAxes: [{ticks:{beginAtZero:true}}]},
        legend:{display:false}
    }
});

var bar = new ProgressBar.SemiCircle(document.getElementById('geralprogress'), {
        strokeWidth: 6,
        color: '#FFEA82',
        trailColor: '#485053',
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '',
            alignToBottom: false
        },
        from: {color: '#2196f3'},
        to: {color: '#2196f3'},
        // Set default step function for all animate calls
        step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
var value = Math.round(bar.value() * 100);
if (value === 0) {
    bar.setText('');
} else {
    bar.setText(value+'%');
}

bar.text.style.color = state.color;
}
});
bar.text.style.fontFamily = 'sans-serif';
bar.text.style.fontSize = '20px';