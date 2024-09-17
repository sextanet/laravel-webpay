<style>
    :root {
        --primary: #d5006c;
        --primary-hover: #b0035b;
        --border-radius: .5rem;
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
    }

    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
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

    .button:hover {
        background: var(--primary-hover);
    }

    code, pre {
        background: #000;
        color: #fff;
        padding: 30px;
        width: 80%;
        border-radius: var(--border-radius);
        overflow: scroll;
        font-family: "Courier New", monospace;
        font-size: .8rem;
        position: relative;
    }

    code.response {
        margin-bottom: 10px;
    }

    code.response::before {
        content: '// 💡 Response for easy debug\A\A';
        white-space: pre;
        color: #666;
        letter-spacing: .01rem;
        font-weight: 600;
        font-size: .850rem;
    }

    .approved {
        background: #d4edda;
        color: #155724;
        padding: 0 2px;
        font-weight: 600;
    }

    .sextanet {
        color: #fff;
        margin: 0 5px;
        font-weight: 600;
        font-family: "Courier New", monospace;
        letter-spacing: .01rem;
    }
</style>
