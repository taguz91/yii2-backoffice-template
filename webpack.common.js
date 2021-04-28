const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  entry: {
    app: path.resolve(__dirname, "backend/webpack/js/app.js"),
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "backend/web/build/"),
  },
  resolve: {
    modules: ["node_modules"],
    extensions: [".jsx", ".js"],
    roots: [path.resolve(__dirname, "backend/webpack")],
    alias: {
      "@": path.resolve(__dirname, "backend/webpack/js"),
      "@components": path.resolve(__dirname, "backend/webpack/js/components"),
      "@utils": path.resolve(__dirname, "backend/webpack/js/utils"),
    },
  },
  plugins: [
    new MiniCssExtractPlugin()
  ],
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          // Translates CSS into CommonJS
          "css-loader",
          // Compiles Sass to CSS
          "sass-loader",
        ],
      },
      {
        test: /\.(ico|jpe?g|png|gif|webp|svg|mp4|webm|wav|mp3|m4a|aac|oga|woff|woff2|eot|ttf)(\?.*)?$/,
        loader: "file-loader",
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-react"],
          },
        },
      },
    ],
  },
};
