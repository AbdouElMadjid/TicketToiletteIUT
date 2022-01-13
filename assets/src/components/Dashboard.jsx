import "./dashboard.css"
import React from "react"
import { render, unmountComponentAtNode } from "react-dom"

function Dashboard() {
    return <div>
        salut tous le monde
    </div>
}

class DashboardElement extends HTMLElement {
    connectedCallback() {
        console.log("Salut tous le monde")
        render(<Dashboard />, this)
    }

    disconnectedCallback() {
        unmountComponentAtNode(this)
    }
}

customElements.define("admin-react", DashboardElement)