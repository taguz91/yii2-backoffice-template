import ReactDOM from "react-dom";

export default (selector, component) => {
  const domContainer = document.querySelector(selector);

  if (domContainer) {
    ReactDOM.render(component, domContainer);
  }
};
