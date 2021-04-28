import React from "react"
import render from "@utils/render";

const Home = () => {
    return (
        <div className="container">
            <h1 className="text-center mt-3">Helo world from react</h1>
        </div>
    );
}

render('#home-page-react', <Home />);