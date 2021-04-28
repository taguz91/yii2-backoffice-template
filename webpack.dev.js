const { merge } = require("webpack-merge");
const common = require("./webpack.common.js");

module.exports = merge(common, {
  mode: "development",
  watch: true,
  watchOptions: {
    ignored: [
      "node_modules/**",
      "vendor/**",
      "backend/web/**",
      "common/**",
      "console/**",
    ],
  },
  devtool: "source-map",
});
