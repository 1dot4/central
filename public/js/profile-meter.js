function drawProfileMeter(value) {
    var opts = {
        lines: 12, // The number of lines to draw
        angle: 0.15, // The length of each line
        lineWidth: 0.44, // The line thickness
        pointer: {
            length: 0.9, // The radius of the inner circle
            strokeWidth: 0.035, // The rotation offset
            color: '#000000' // Fill color
        },
        limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
        colorStart: '#6FADCF',   // Colors
        colorStop: '#8FC0DA',    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true,
        percentColors: [[0.0, "#f1c40f" ], [0.20, "#e67e22"], [0.4, "#e74c3c"], [0.6, "#3498db"], [0.8, "#2980b9"], [1.0, "#2ecc71"]]
    };
    var target = document.getElementById('profile-meter'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 100; // set max gauge value
    gauge.animationSpeed = 39; // set animation speed (32 is default value)
    gauge.set(value); // set actual value
}