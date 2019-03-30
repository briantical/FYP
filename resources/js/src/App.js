import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from "react-router-dom";

import Index from './components/Index'

export default class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Index />
            </BrowserRouter>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
