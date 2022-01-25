import "./admin.css"
import React from "react"
import { render, unmountComponentAtNode } from "react-dom"
import Body from "./body/Body"
import Sidebar from "./sidebar/Sidebar"


function Admin() {

    return <div className="container">
        <Sidebar />
        <Body />
    </div>
}

class AdminElement extends HTMLElement {
    connectedCallback() {
        console.log("Salut tous le monde")
        render(<Admin />, this)
    }

    disconnectedCallback() {
        unmountComponentAtNode(this)
    }
}

customElements.define("admin-react", AdminElement)