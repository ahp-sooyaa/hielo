<template>
  <div class="container">
    <line-chart v-if="loaded" :chartdata="chartdata" :options="options" />
  </div>
</template>

<script>
import LineChart from "../lineChart";
import axios from "axios";

export default {
  name: "LineChartContainer",
  components: { LineChart },
  data() {
    return {
      loaded: false,
      chartdata: null,
      options: {
        responsive: true,
        maintainAspectRatio: false,
      },
    };
  },
  mounted() {
    this.loaded = false;
    axios
      .get(`/api/chart`)
      .then((response) => {
        this.chartdata = {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "June",
            "July",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Registered Users",
              fill: false,
              borderColor: "#3490dc",
              pointBorderColor: "#fff",
              pointBackgroundColor: "#3490dc",
              borderWidth: 2,
              data: response.data.userArr,
            },
            {
              label: "Published Posts",
              fill: false,
              borderColor: "#38c172",
              pointBorderColor: "#fff",
              pointBackgroundColor: "#38c172",
              borderWidth: 2,
              data: response.data.postArr,
            },
          ],
        };
        this.loaded = true;
      })
      .catch((error) => {
        console.log(error.response);
      });
  },
};
</script>