<style>
    :root {
        --primary: #d5006c;
        --primary-hover: #b0035b;
        --border-radius: .5rem;
        --code-color: #010027;
        --code-comment-color: #d3a600;
    }

    * {
        margin: 0;
        font-family: "Arial", sans-serif;
        font-weight: 400;
        font-style: normal;
        color: #666;
        letter-spacing: 1px;
    }
    
    header {
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
        position: fixed;
        width: 100%;
        height: 100px;
        background: rgba(0,0,0,.05);
        backdrop-filter: blur(1px);
        top: 0;
    }

    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        gap: 20px;
    }

    footer {
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(270deg, #0066cc, #9d1cbf);
        position: fixed;
        width: 100%;
        height: 50px;
        bottom: 0;
        color: #fff;
        font-size: .625rem;
    }

    .options {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a {
        text-decoration: none;
    }

    .give-us-a-star {
        background: rgba(0, 2, 72, 0.5);
        backdrop-filter: blur(3px);
        width: 100vw;
        height: 100vh;
        position: fixed;
        z-index: 10;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .give-us-a-star.display {
        display: flex;
    }

    .give-us-a-star .content {
        text-align: center;
        background: #fff;
        padding: 20px;
        border-radius: var(--border-radius);
        box-shadow: 0 0 10px rgba(0,0,0,.1);
        width: 300px;
    }

    .give-us-a-star .content .question {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .give-us-a-star .content .description {
        margin: 1rem auto;
    }
    
    .give-us-a-star .content .star {
        margin-top: 1rem;
    }

    .give-us-a-star .content .buttons {
        margin-top: 1rem;
    }

    .button, button {
        all: unset;
        cursor: pointer;
        background: var(--primary);
        color: #fff;
        padding: .675rem 1.5rem;
        border-radius: var(--border-radius);
        transition: filter 200ms;
        font-weight: 600;
    }

    .button.small, button.small {
        padding: .5rem 1rem;
        font-size: .8rem;
    }

    .button:hover {
        background: var(--primary-hover);
    }

    code, pre {
        background: var(--code-color);
        color: #fff;
        padding: 30px;
        width: 80%;
        border-radius: var(--border-radius);
        overflow: scroll;
        font-family: "Courier New", monospace;
        font-size: .8rem;
        position: relative;
    }

    code::before, pre::before {
        white-space: pre;
        letter-spacing: .01rem;
        font-weight: 600;
        font-size: .850rem;
        display: block;
        margin-bottom: 10px;
        color: var(--code-comment-color);
        content: "// " attr(data-comment);
    }

    .approved {
        background: #d4edda;
        color: #155724;
        padding: 0 2px;
        font-weight: 600;
    }

    .cancelled, .rejected {
        background: #f8d7da;
        color: #721c24;
        padding: 0 2px;
        font-weight: 600;
    }

    .toggle {
        text-decoration: underline;
        text-underline-offset: 5px;
        cursor: pointer;
    }

    .hidden {
        display: none;
    }

    .sextanet {
        color: #fff;
        margin: 0 5px;
        font-weight: 600;
        font-family: "Courier New", monospace;
        letter-spacing: .01rem;
    }
</style>
