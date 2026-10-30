<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dev Toolbox — geliştirici dönüşümleri</title>
    <style>
:root {
    --bg: #fbf7ed;
    --surface: #f2ead8;
    --surface-raised: #f6efe0;
    --ink: #282828;
    --ink-soft: #46433d;
    --muted: #6b665c;
    --line: #ded5c3;
    --line-strong: #c8bca6;
    --accent: #a4481f;
    --accent-soft: #f0dccb;
    --olive: #5b6a3d;
    --focus: #8d3a16;
    --selection: #e9d3bf;
    --font-sans: "Segoe UI", system-ui, -apple-system, "Helvetica Neue", Arial, sans-serif;
    --font-serif: "Iowan Old Style", "Palatino Linotype", Palatino, "Book Antiqua", Georgia, serif;
    --font-mono: "Cascadia Mono", ui-monospace, SFMono-Regular, Consolas, "Liberation Mono", monospace;
    --container: 1160px;
    --gutter: clamp(1.25rem, 4vw, 2.5rem);
    --radius: 2px;
    --ease: cubic-bezier(.2, .6, .2, 1);
    --speed: 180ms;
    color-scheme: light;
}

@media (prefers-color-scheme: dark) {
    :root {
        --bg: #0d1117;
        --surface: #161b22;
        --surface-raised: #1b222c;
        --ink: #e6edf3;
        --ink-soft: #c9d1d9;
        --muted: #9aa4af;
        --line: #30363d;
        --line-strong: #3d444d;
        --accent: #79b8ff;
        --accent-soft: #16283c;
        --olive: #8fbf7f;
        --focus: #a5d6ff;
        --selection: #1f3a56;
        color-scheme: dark;
    }
}

*, *::before, *::after { box-sizing: border-box; }
html { -webkit-text-size-adjust: 100%; }
body {
    margin: 0;
    background: var(--bg);
    color: var(--ink);
    font-family: var(--font-sans);
    font-size: 1rem;
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
}
main { display: block; }
h1, h2, h3 { color: var(--ink); text-wrap: balance; }
p { margin-top: 0; }
a { color: var(--accent); text-decoration-thickness: 1px; text-underline-offset: .18em; }
[hidden] { display: none !important; }
::selection { background: var(--selection); color: var(--ink); }

.container {
    width: 100%;
    max-width: var(--container);
    margin-inline: auto;
    padding-inline: var(--gutter);
}

.section { padding-block: clamp(2.25rem, 5vw, 3.75rem); }

.row { display: flex; flex-wrap: wrap; margin-inline: -.75rem; }
.row > * { width: 100%; padding-inline: .75rem; }

@media (min-width: 992px) {
    .col-lg-4 { width: 33.3333%; }
    .col-lg-5 { width: 41.6667%; }
    .col-lg-7 { width: 58.3333%; }
    .col-lg-8 { width: 66.6667%; }
    .offset-lg-1 { margin-left: 8.3333%; }
}

.section__label {
    margin-bottom: 1.15rem;
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .67rem;
    letter-spacing: .14em;
    line-height: 1.5;
    text-transform: uppercase;
}

.section__num { margin-right: .45rem; color: var(--accent); }

.section__title {
    margin: 0 0 1.25rem;
    font-family: var(--font-serif);
    font-size: clamp(2rem, 3.8vw, 3rem);
    font-weight: 400;
    line-height: 1.06;
    letter-spacing: -.03em;
}

.section__intro {
    max-width: 36rem;
    margin-bottom: 1.5rem;
    color: var(--ink-soft);
    font-size: .98rem;
    line-height: 1.7;
}

.visually-hidden {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}

:where(a, button, [tabindex]):focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 3px;
}

@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
    }
}
/* ==========================================================================
   Tarayıcı araçları — Image Toolkit, Dev Toolbox, Text Diff, CSV, QR Studio
   Renkler site.css tokenlarından gelir; iki tema da desteklenir.
   ========================================================================== */

:root {
    --tool-add-bg: #e6efdb;
    --tool-add-ink: #2f4a1f;
    --tool-del-bg: #f7e2d8;
    --tool-del-ink: #7a2c10;
    --tool-change-bg: #f4e8c8;
    --tool-change-ink: #6b4a0f;
    --tool-warn-bg: #f6ecd2;
    --tool-warn-line: #a56a14;
}

[data-theme="dark"] {
    --tool-add-bg: #14261a;
    --tool-add-ink: #b8e6b0;
    --tool-del-bg: #2b1512;
    --tool-del-ink: #ffc2ad;
    --tool-change-bg: #2a2311;
    --tool-change-ink: #f0d491;
    --tool-warn-bg: #2a2311;
    --tool-warn-line: #d4a24a;
}

.site-nav--tool .site-nav__list {
    gap: 1.5rem;
}

.site-nav__label {
    display: inline-flex;
    align-items: center;
    min-height: 2.75rem;
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .72rem;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.tool .section__intro {
    max-width: 34rem;
}

.tool [hidden] {
    display: none !important;
}

/* Bilgi blokları --------------------------------------------------------- */

.tool-notice {
    margin-top: 2rem;
    padding: 1.35rem 1.4rem;
    border: 1px solid var(--line);
    border-left: 2px solid var(--accent);
    background: var(--surface-raised);
}

.tool-notice__title {
    margin: 0 0 .75rem;
    font-family: var(--font-mono);
    font-size: .74rem;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--muted);
}

.tool-notice__list {
    margin: 0;
    padding-left: 1.1rem;
    color: var(--ink-soft);
    font-size: .88rem;
    line-height: 1.6;
}

.tool-notice__list li + li {
    margin-top: .3rem;
}

.tool-meta {
    margin-top: 2rem;
}

.tool-meta__title {
    margin: 0 0 .6rem;
    font-family: var(--font-mono);
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .09em;
    text-transform: uppercase;
    color: var(--muted);
}

.tool-meta__line {
    margin: 0 0 .35rem;
    color: var(--ink-soft);
    font-size: .86rem;
    line-height: 1.55;
}

.tool-meta__key {
    display: inline-block;
    min-width: 7.5rem;
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .72rem;
    letter-spacing: .05em;
    text-transform: uppercase;
}

.tool-notes {
    margin: 0;
    padding-left: 1.1rem;
    color: var(--muted);
    font-size: .82rem;
    line-height: 1.6;
}

.tool-notes li + li {
    margin-top: .25rem;
}

.tool-links {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem 1.75rem;
    margin-top: 1.6rem;
}

.tool-noscript {
    margin-top: 1rem;
    color: var(--muted);
    font-size: .82rem;
    line-height: 1.5;
}

/* Paneller, alanlar ve düğmeler ----------------------------------------- */

.tool-panel {
    padding: clamp(1.15rem, 3vw, 1.9rem);
    border: 1px solid var(--line);
    background: var(--surface-raised);
}

.tool-panel + .tool-panel {
    margin-top: 1.25rem;
}

.tool-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem 1.25rem;
}

.tool-grid--three {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.tool-field {
    min-width: 0;
    margin-bottom: 1.1rem;
}

.tool-grid .tool-field {
    margin-bottom: 0;
}

.tool-label,
.tool-legend {
    display: block;
    margin-bottom: .4rem;
    font-family: var(--font-mono);
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .07em;
    text-transform: uppercase;
    color: var(--muted);
}

.tool-field__hint,
.tool-hint {
    margin: .45rem 0 0;
    color: var(--muted);
    font-size: .8rem;
    line-height: 1.5;
}

.tool-input,
.tool-select,
.tool-textarea {
    width: 100%;
    min-height: 2.75rem;
    padding: .55rem .7rem;
    border: 1px solid var(--line-strong);
    border-radius: var(--radius);
    background: var(--bg);
    color: var(--ink);
    font: inherit;
    font-size: .92rem;
}

.tool-textarea {
    min-height: 10rem;
    resize: vertical;
    font-family: var(--font-mono);
    font-size: .84rem;
    line-height: 1.55;
}

.tool-textarea--short {
    min-height: 6rem;
}

.tool-input:focus-visible,
.tool-select:focus-visible,
.tool-textarea:focus-visible,
.column-toggle input:focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

.tool-input:disabled,
.tool-select:disabled,
.tool-textarea:disabled {
    opacity: .6;
}

.tool-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: .6rem 1rem;
}

.tool-check {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    min-height: 2.75rem;
    color: var(--ink-soft);
    font-size: .86rem;
}

.tool-check input {
    width: 1.1rem;
    height: 1.1rem;
    accent-color: var(--accent);
}

.tool-actions {
    display: flex;
    flex-wrap: wrap;
    gap: .75rem;
    margin-top: 1.3rem;
}

.button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 2.75rem;
    padding: .55rem 1.15rem;
    border: 1px solid var(--line-strong);
    border-radius: var(--radius);
    background: transparent;
    color: var(--ink);
    font: inherit;
    font-size: .86rem;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: background var(--speed) var(--ease), border-color var(--speed) var(--ease), color var(--speed) var(--ease);
}

.button--primary {
    border-color: var(--accent);
    background: var(--accent);
    color: var(--bg);
}

.button--quiet {
    color: var(--ink-soft);
}

.button:disabled {
    cursor: not-allowed;
    opacity: .55;
}

@media (hover: hover) {
    .button:not(:disabled):hover {
        border-color: var(--accent);
        background: var(--surface);
        color: var(--accent);
    }

    .button--primary:not(:disabled):hover {
        background: var(--ink);
        border-color: var(--ink);
        color: var(--bg);
    }
}

.button:focus-visible,
.dev-tab:focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

.tool-status {
    min-height: 1.4rem;
    margin: 1rem 0 0;
    color: var(--ink-soft);
    font-size: .86rem;
    line-height: 1.5;
}

.tool-status.is-error {
    color: var(--accent);
}

.tool-empty {
    margin: 1rem 0 0;
    padding: 1.25rem;
    border: 1px dashed var(--line-strong);
    color: var(--muted);
    font-size: .88rem;
    line-height: 1.55;
    text-align: center;
}

.tool-warning {
    margin: 1rem 0 0;
    padding: .8rem 1rem;
    border-left: 2px solid var(--tool-warn-line);
    background: var(--tool-warn-bg);
    color: var(--ink-soft);
    font-size: .84rem;
    line-height: 1.55;
}

.tool-output {
    min-height: 7rem;
    max-height: 24rem;
    margin: 0;
    padding: .9rem 1rem;
    overflow: auto;
    border: 1px solid var(--line);
    background: var(--bg);
    color: var(--ink);
    font-family: var(--font-mono);
    font-size: .82rem;
    line-height: 1.55;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

.tool-output:empty::before {
    content: "Sonuç burada görünecek.";
    color: var(--muted);
}

/* Dosya bırakma ---------------------------------------------------------- */

.dropzone {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .35rem;
    min-height: 10rem;
    padding: 1.6rem 1.25rem;
    border: 1px dashed var(--line-strong);
    border-radius: var(--radius);
    background: var(--bg);
    text-align: center;
    cursor: pointer;
    transition: border-color var(--speed) var(--ease), background var(--speed) var(--ease);
}

.dropzone:hover,
.dropzone:focus-within {
    border-color: var(--accent);
    background: var(--surface);
}

.dropzone.is-dragover {
    border-style: solid;
    border-color: var(--accent);
    background: var(--accent-soft);
}

.dropzone__icon {
    font-family: var(--font-mono);
    font-size: 1.4rem;
    color: var(--accent);
}

.dropzone__title {
    font-size: .98rem;
    font-weight: 600;
    color: var(--ink);
}

.dropzone__hint {
    max-width: 26rem;
    color: var(--muted);
    font-size: .82rem;
    line-height: 1.5;
}

.dropzone:focus-within {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

/* Image Toolkit ---------------------------------------------------------- */

.image-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr);
    gap: 1.25rem;
}

.image-preview-wrap {
    padding: 1rem;
    border: 1px solid var(--line);
    background: var(--bg);
}

.image-preview {
    display: block;
    width: 100%;
    max-width: 34rem;
    height: auto;
    min-height: 9rem;
    margin: 0 auto;
    border: 1px solid var(--line);
    background: var(--surface);
}

.image-preview-note {
    margin: .7rem 0 0;
    color: var(--muted);
    font-size: .8rem;
    line-height: 1.45;
    text-align: center;
}

.image-list {
    margin: 1rem 0 0;
    padding: 0;
    list-style: none;
    border-top: 1px solid var(--line);
}

.image-list:empty {
    border-top: 0;
}

.image-item {
    padding: .9rem .1rem;
    border-bottom: 1px solid var(--line);
}

.image-item__main {
    display: flex;
    align-items: flex-start;
    gap: .9rem;
}

.image-item__text {
    flex: 1 1 auto;
    min-width: 0;
}

.image-thumb {
    flex: 0 0 auto;
    max-width: 104px;
    max-height: 104px;
    border: 1px solid var(--line);
    background: var(--surface);
}

.image-item__name {
    margin: 0;
    overflow-wrap: anywhere;
    font-size: .92rem;
    font-weight: 600;
}

.image-item__meta {
    margin: .25rem 0 0;
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .72rem;
    line-height: 1.45;
}

.image-item__state {
    margin: .4rem 0 0;
    color: var(--ink-soft);
    font-size: .82rem;
    line-height: 1.45;
}

.image-item__state.is-error {
    color: var(--accent);
}

.image-item__actions {
    display: flex;
    flex-wrap: wrap;
    gap: .35rem;
    margin-top: .5rem;
}

.image-item__remove {
    min-height: 2.75rem;
    padding: .3rem .65rem;
    border: 1px solid transparent;
    border-radius: var(--radius);
    background: transparent;
    color: var(--muted);
    font: inherit;
    font-size: .78rem;
    cursor: pointer;
}

.image-item__remove:hover,
.image-item__remove:focus-visible {
    border-color: var(--line-strong);
    color: var(--ink);
}

.image-item__remove:focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

.image-item__result {
    margin: .55rem 0 0;
}

.image-download {
    display: inline-flex;
    align-items: center;
    min-height: 2.75rem;
    color: var(--ink);
    font-size: .86rem;
    font-weight: 600;
    text-decoration: underline;
    text-decoration-color: var(--line-strong);
    text-underline-offset: .25em;
}

.image-download:focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

/* Dev Toolbox ------------------------------------------------------------ */

.dev-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: .35rem;
    margin: 0 0 1.1rem;
    padding: 0;
    list-style: none;
    border-bottom: 1px solid var(--line);
}

.dev-tab {
    min-height: 2.75rem;
    padding: .5rem .85rem;
    border: 0;
    border-bottom: 2px solid transparent;
    background: transparent;
    color: var(--muted);
    font: inherit;
    font-size: .82rem;
    font-weight: 600;
    cursor: pointer;
}

.dev-tab[aria-selected="true"] {
    border-bottom-color: var(--accent);
    color: var(--ink);
}

.dev-panel {
    min-width: 0;
}

.dev-panel__title {
    margin: 0 0 .5rem;
    font-family: var(--font-serif);
    font-size: 1.3rem;
}

.dev-panel__intro {
    margin: 0 0 1rem;
    color: var(--ink-soft);
    font-size: .86rem;
    line-height: 1.55;
}

.dev-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
}

.dev-output-label {
    display: block;
    margin: 1rem 0 .4rem;
    font-family: var(--font-mono);
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .07em;
    text-transform: uppercase;
    color: var(--muted);
}

.dev-jwt-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

/* Text Diff -------------------------------------------------------------- */

.diff-layout {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
}

.diff-summary {
    margin: 1rem 0 0;
    padding: .75rem 1rem;
    border-left: 2px solid var(--accent);
    background: var(--surface);
    color: var(--ink-soft);
    font-size: .86rem;
    line-height: 1.5;
}

.diff-summary.is-error {
    color: var(--accent);
}

.diff-scroll {
    max-height: 34rem;
    margin-top: 1rem;
    overflow: auto;
    border: 1px solid var(--line);
    background: var(--bg);
}

.diff-table {
    width: 100%;
    border-collapse: collapse;
    font-family: var(--font-mono);
    font-size: .78rem;
    line-height: 1.5;
}

.diff-table caption {
    padding: .55rem .7rem;
    border-bottom: 1px solid var(--line);
    color: var(--muted);
    font-family: var(--font-sans);
    font-size: .78rem;
    text-align: left;
}

.diff-table th {
    position: sticky;
    top: 0;
    z-index: 1;
    padding: .45rem .55rem;
    border-bottom: 1px solid var(--line-strong);
    background: var(--surface);
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .68rem;
    font-weight: 600;
    letter-spacing: .05em;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.diff-table td {
    padding: .38rem .55rem;
    border-bottom: 1px solid var(--line);
    vertical-align: top;
}

.diff-table__number {
    width: 4.2rem;
    color: var(--muted);
    text-align: right;
    white-space: nowrap;
}

.diff-table__status {
    width: 3.2rem;
    font-weight: 700;
    text-align: center;
}

.diff-table__text {
    overflow-wrap: anywhere;
    white-space: pre-wrap;
}

.diff-row--insert {
    background: var(--tool-add-bg);
    color: var(--tool-add-ink);
}

.diff-row--delete {
    background: var(--tool-del-bg);
    color: var(--tool-del-ink);
}

.diff-row--change {
    background: var(--tool-change-bg);
    color: var(--tool-change-ink);
}

.diff-row--equal {
    color: var(--ink-soft);
}

.diff-line {
    display: block;
}

.diff-line--removed::before {
    content: "− ";
    font-weight: 700;
}

.diff-line--added::before {
    content: "+ ";
    font-weight: 700;
}

.diff-line--removed {
    text-decoration: line-through;
    text-decoration-thickness: 1px;
}

.diff-empty {
    padding: 1.25rem !important;
    color: var(--muted);
    text-align: center;
}

/* CSV Toolkit ------------------------------------------------------------ */

.csv-controls {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1rem;
    margin-top: 1.1rem;
}

.csv-columns {
    display: flex;
    flex-wrap: wrap;
    gap: .2rem .9rem;
    max-height: 10rem;
    margin: .2rem 0 0;
    padding: .5rem .65rem;
    overflow: auto;
    border: 1px solid var(--line);
    background: var(--bg);
}

.column-toggle {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    min-height: 2.75rem;
    color: var(--ink-soft);
    font-size: .8rem;
    overflow-wrap: anywhere;
}

.column-toggle input {
    flex: 0 0 auto;
    width: 1rem;
    height: 1rem;
    accent-color: var(--accent);
}

.csv-scroll {
    max-height: 32rem;
    margin-top: 1rem;
    overflow: auto;
    border: 1px solid var(--line);
    background: var(--bg);
}

.csv-table {
    width: 100%;
    border-collapse: collapse;
    font-family: var(--font-mono);
    font-size: .76rem;
    line-height: 1.45;
}

.csv-table caption {
    padding: .55rem .7rem;
    border-bottom: 1px solid var(--line);
    color: var(--muted);
    font-family: var(--font-sans);
    font-size: .78rem;
    text-align: left;
}

.csv-table th {
    position: sticky;
    top: 0;
    z-index: 1;
    padding: .5rem .55rem;
    border-bottom: 1px solid var(--line-strong);
    background: var(--surface);
    color: var(--ink-soft);
    font-family: var(--font-mono);
    font-size: .7rem;
    font-weight: 600;
    text-align: left;
    white-space: nowrap;
}

.csv-table td {
    max-width: 24rem;
    padding: .42rem .55rem;
    border-bottom: 1px solid var(--line);
    overflow-wrap: anywhere;
    vertical-align: top;
    white-space: pre-wrap;
}

.csv-table__line {
    width: 7rem;
    color: var(--muted);
    white-space: nowrap;
}

.csv-row.is-duplicate {
    background: var(--tool-change-bg);
    color: var(--tool-change-ink);
}

.csv-duplicate-badge {
    display: inline-block;
    padding: .05rem .3rem;
    border: 1px solid currentColor;
    border-radius: var(--radius);
    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .03em;
    text-transform: uppercase;
}

.csv-empty {
    padding: 1.25rem !important;
    color: var(--muted);
    text-align: center;
}

.csv-note {
    margin: .7rem 0 0;
    color: var(--muted);
    font-size: .78rem;
    line-height: 1.5;
}

/* QR Studio -------------------------------------------------------------- */

.qr-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(15rem, .85fr);
    gap: 1.25rem;
    align-items: start;
}

.qr-preview-wrap {
    padding: 1rem;
    border: 1px solid var(--line);
    background: var(--bg);
    text-align: center;
}

.qr-preview {
    display: block;
    width: 100%;
    max-width: 26rem;
    aspect-ratio: 1 / 1;
    height: auto;
    margin: 0 auto;
    image-rendering: pixelated;
    border: 1px solid var(--line);
    background: var(--surface);
}

.qr-divider {
    margin: 1.2rem 0;
    border: 0;
    border-top: 1px solid var(--line);
}

.qr-size-note {
    margin: .7rem 0 0;
    color: var(--muted);
    font-family: var(--font-mono);
    font-size: .7rem;
    line-height: 1.45;
}

.qr-color-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
}

.qr-color {
    width: 100%;
    min-height: 2.75rem;
    padding: .2rem;
    border: 1px solid var(--line-strong);
    border-radius: var(--radius);
    background: var(--bg);
    cursor: pointer;
}

.qr-color:focus-visible {
    outline: 2px solid var(--focus);
    outline-offset: 2px;
}

/* Duyarlı ---------------------------------------------------------------- */

@media (max-width: 991.98px) {
    .qr-layout {
        grid-template-columns: minmax(0, 1fr);
    }

    .csv-controls {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 767.98px) {
    .tool-grid,
    .tool-grid--three,
    .dev-grid,
    .dev-jwt-grid,
    .diff-layout {
        grid-template-columns: minmax(0, 1fr);
    }

    .csv-controls {
        grid-template-columns: minmax(0, 1fr);
    }

    .tool-meta__key {
        display: block;
        min-width: 0;
    }

    .image-item__main {
        align-items: stretch;
    }

    .image-thumb {
        max-width: 72px;
        max-height: 72px;
    }
}

@media (max-width: 575.98px) {
    .tool-panel {
        padding: 1rem;
    }

    .tool-actions .button {
        flex: 1 1 auto;
    }

    .diff-table {
        font-size: .72rem;
    }

    .diff-table__number {
        width: 2.6rem;
    }

    .diff-table__status {
        width: 2.2rem;
    }
}

@media (prefers-reduced-motion: reduce) {
    .dropzone,
    .button {
        transition: none;
    }
}

    </style>
</head>
<body>
<main>
<section class="section tool" aria-labelledby="tool-title">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <p class="section__label"><span class="section__num">Araç</span> Dev Toolbox</p>
                <h1 class="section__title" id="tool-title">Geliştirici dönüşümleri, tek sayfada.</h1>
                <p class="section__intro">
                    JSON ve XML doğrulayın; Base64, URL ve UTF-8 dönüşümleri yapın; SHA özetleri üretin
                    ve JWT başlık/payload bölümlerini inceleyin.
                </p>

                <div class="tool-notice">
                    <h2 class="tool-notice__title">Çalışma biçimi</h2>
                    <ul class="tool-notice__list">
                        <li>JSON/XML ayrıştırma, dönüşümler ve hash üretimi tarayıcı API’leriyle yapılır.</li>
                        <li>Sayfayı yenilediğinizde girdiler ve sonuçlar kaybolur.</li>
                        <li>JWT aracı başlık ve payload bölümlerini çözümler; imzayı doğrulamaz.</li>
                    </ul>
                </div>

                <div class="tool-meta">
                    <h2 class="tool-meta__title">JWT hakkında</h2>
                    <p class="tool-meta__line">
                        JWT aracı yalnızca başlık ve payload bölümlerini Base64URL’den çözümleyip gösterir.
                        <strong>İmza doğrulanmaz.</strong> Görüntülenen token’ın geçerli, değiştirilmemiş
                        veya güvenilir olduğu anlamına gelmez.
                    </p>
                </div>

                <div class="tool-meta">
                    <h2 class="tool-meta__title">Sınırlar</h2>
                    <ul class="tool-notes">
                        <li>Metin girdileri en fazla 2 MB işlenir.</li>
                        <li>XML doğrulaması tarayıcının DOMParser uygulamasına dayanır; harici varlık yüklenmez.</li>
                        <li>Hash için Web Crypto API gerekir. SHA-1 yalnızca uyumluluk içindir; yeni tasarımlarda SHA-256 veya üstü kullanın.</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1" data-dev-tool>
                <div class="tool-panel">
                    <div class="dev-tabs" role="tablist" aria-label="Geliştirici araçları">
                        <button class="dev-tab" id="dev-tab-json" type="button" role="tab" aria-selected="true" aria-controls="dev-panel-json" tabindex="0" data-dev-tab="json">JSON</button>
                        <button class="dev-tab" id="dev-tab-xml" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-xml" tabindex="-1" data-dev-tab="xml">XML</button>
                        <button class="dev-tab" id="dev-tab-base64" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-base64" tabindex="-1" data-dev-tab="base64">Base64</button>
                        <button class="dev-tab" id="dev-tab-url" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-url" tabindex="-1" data-dev-tab="url">URL</button>
                        <button class="dev-tab" id="dev-tab-utf8" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-utf8" tabindex="-1" data-dev-tab="utf8">UTF-8</button>
                        <button class="dev-tab" id="dev-tab-hash" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-hash" tabindex="-1" data-dev-tab="hash">Hash</button>
                        <button class="dev-tab" id="dev-tab-jwt" type="button" role="tab" aria-selected="false" aria-controls="dev-panel-jwt" tabindex="-1" data-dev-tab="jwt">JWT</button>
                    </div>

                    <section class="dev-panel" id="dev-panel-json" role="tabpanel" aria-labelledby="dev-tab-json" data-dev-panel="json">
                        <h2 class="dev-panel__title">JSON biçimlendir ve doğrula</h2>
                        <p class="dev-panel__intro">Hatalı JSON’da tarayıcının verdiği konum varsa satır ve sütun bilgisi gösterilir.</p>
                        <label class="tool-label" for="dev-json-input">JSON girdisi</label>
                        <textarea class="tool-textarea" id="dev-json-input" spellcheck="false" aria-describedby="dev-json-hint"></textarea>
                        <p class="tool-field__hint" id="dev-json-hint">Biçimlendirme 2 boşluk girinti kullanır; küçültme boşlukları kaldırır.</p>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-json-format>Biçimlendir</button>
                            <button class="button" type="button" data-json-minify>Küçült</button>
                            <button class="button" type="button" data-json-validate>Doğrula</button>
                            <button class="button button--quiet" type="button" data-copy-target="dev-json-output">Sonucu kopyala</button>
                        </div>
                        <span class="dev-output-label" id="dev-json-output-label">Sonuç</span>
                        <pre class="tool-output" id="dev-json-output" tabindex="0" aria-labelledby="dev-json-output-label"></pre>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="json"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-xml" role="tabpanel" aria-labelledby="dev-tab-xml" data-dev-panel="xml" hidden>
                        <h2 class="dev-panel__title">XML doğrula</h2>
                        <p class="dev-panel__intro">İyi biçimlendirilmiş XML denetlenir. Tarayıcı hata konumu veriyorsa satır ve sütun gösterilir.</p>
                        <label class="tool-label" for="dev-xml-input">XML girdisi</label>
                        <textarea class="tool-textarea" id="dev-xml-input" spellcheck="false" aria-describedby="dev-xml-hint"></textarea>
                        <p class="tool-field__hint" id="dev-xml-hint">Harici DTD veya varlık yüklenmez; doğrulama yalnızca tarayıcı ayrıştırıcısıyla yapılır.</p>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-xml-validate>Doğrula</button>
                        </div>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="xml"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-base64" role="tabpanel" aria-labelledby="dev-tab-base64" data-dev-panel="base64" hidden>
                        <h2 class="dev-panel__title">Base64 kodla veya çöz</h2>
                        <p class="dev-panel__intro">Metin UTF-8 olarak kodlanır. Çözme sırasında geçersiz UTF-8 ve hatalı dolgu reddedilir.</p>
                        <div class="tool-field">
                            <label class="tool-label" for="dev-base64-mode">Yön</label>
                            <select class="tool-select" id="dev-base64-mode">
                                <option value="encode">Metin → Base64</option>
                                <option value="decode">Base64 → metin</option>
                            </select>
                        </div>
                        <label class="tool-label" for="dev-base64-input">Girdi</label>
                        <textarea class="tool-textarea tool-textarea--short" id="dev-base64-input" spellcheck="false"></textarea>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-base64-run>Dönüştür</button>
                            <button class="button button--quiet" type="button" data-copy-target="dev-base64-output">Sonucu kopyala</button>
                        </div>
                        <span class="dev-output-label" id="dev-base64-output-label">Sonuç</span>
                        <pre class="tool-output" id="dev-base64-output" tabindex="0" aria-labelledby="dev-base64-output-label"></pre>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="base64"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-url" role="tabpanel" aria-labelledby="dev-tab-url" data-dev-panel="url" hidden>
                        <h2 class="dev-panel__title">URL bileşeni kodla veya çöz</h2>
                        <p class="dev-panel__intro">encodeURIComponent/decodeURIComponent kullanılır. Boşluk %20 olur; artı (+) işareti boşluğa çevrilmez.</p>
                        <div class="tool-field">
                            <label class="tool-label" for="dev-url-mode">Yön</label>
                            <select class="tool-select" id="dev-url-mode">
                                <option value="encode">Metin → URL bileşeni</option>
                                <option value="decode">URL bileşeni → metin</option>
                            </select>
                        </div>
                        <label class="tool-label" for="dev-url-input">Girdi</label>
                        <textarea class="tool-textarea tool-textarea--short" id="dev-url-input" spellcheck="false"></textarea>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-url-run>Dönüştür</button>
                            <button class="button button--quiet" type="button" data-copy-target="dev-url-output">Sonucu kopyala</button>
                        </div>
                        <span class="dev-output-label" id="dev-url-output-label">Sonuç</span>
                        <pre class="tool-output" id="dev-url-output" tabindex="0" aria-labelledby="dev-url-output-label"></pre>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="url"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-utf8" role="tabpanel" aria-labelledby="dev-tab-utf8" data-dev-panel="utf8" hidden>
                        <h2 class="dev-panel__title">UTF-8 baytları</h2>
                        <p class="dev-panel__intro">Metni UTF-8 baytlarının onaltılık gösterimine çevirin veya geçerli UTF-8 baytlarını metne dönüştürün.</p>
                        <div class="tool-field">
                            <label class="tool-label" for="dev-utf8-mode">Yön</label>
                            <select class="tool-select" id="dev-utf8-mode">
                                <option value="encode">Metin → UTF-8 hex</option>
                                <option value="decode">UTF-8 hex → metin</option>
                            </select>
                        </div>
                        <label class="tool-label" for="dev-utf8-input">Girdi</label>
                        <textarea class="tool-textarea tool-textarea--short" id="dev-utf8-input" spellcheck="false" aria-describedby="dev-utf8-hint"></textarea>
                        <p class="tool-field__hint" id="dev-utf8-hint">Hex baytları boşluk veya virgülle ayrılabilir; örnek: 54 75 72 6b 69 79 65.</p>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-utf8-run>Dönüştür</button>
                            <button class="button button--quiet" type="button" data-copy-target="dev-utf8-output">Sonucu kopyala</button>
                        </div>
                        <span class="dev-output-label" id="dev-utf8-output-label">Sonuç</span>
                        <pre class="tool-output" id="dev-utf8-output" tabindex="0" aria-labelledby="dev-utf8-output-label"></pre>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="utf8"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-hash" role="tabpanel" aria-labelledby="dev-tab-hash" data-dev-panel="hash" hidden>
                        <h2 class="dev-panel__title">SHA hash üret</h2>
                        <p class="dev-panel__intro">Metin UTF-8 olarak kodlanır ve Web Crypto API ile özetlenir.</p>
                        <div class="tool-field">
                            <label class="tool-label" for="dev-hash-algorithm">Algoritma</label>
                            <select class="tool-select" id="dev-hash-algorithm">
                                <option value="SHA-256" selected>SHA-256</option>
                                <option value="SHA-384">SHA-384</option>
                                <option value="SHA-512">SHA-512</option>
                                <option value="SHA-1">SHA-1 (uyumluluk)</option>
                            </select>
                        </div>
                        <label class="tool-label" for="dev-hash-input">Metin</label>
                        <textarea class="tool-textarea tool-textarea--short" id="dev-hash-input" spellcheck="false"></textarea>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-hash-run>Hash üret</button>
                            <button class="button button--quiet" type="button" data-copy-target="dev-hash-output">Sonucu kopyala</button>
                        </div>
                        <span class="dev-output-label" id="dev-hash-output-label">Onaltılık özet</span>
                        <pre class="tool-output" id="dev-hash-output" tabindex="0" aria-labelledby="dev-hash-output-label"></pre>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="hash"></p>
                    </section>

                    <section class="dev-panel" id="dev-panel-jwt" role="tabpanel" aria-labelledby="dev-tab-jwt" data-dev-panel="jwt" hidden>
                        <h2 class="dev-panel__title">JWT başlık ve payload görüntüle</h2>
                        <p class="dev-panel__intro">
                            Token yalnızca çözümlenir. <strong>İmza doğrulanmaz</strong> ve token’ın geçerli
                            olduğu iddia edilmez.
                        </p>
                        <label class="tool-label" for="dev-jwt-input">JWT</label>
                        <textarea class="tool-textarea tool-textarea--short" id="dev-jwt-input" spellcheck="false" aria-describedby="dev-jwt-hint"></textarea>
                        <p class="tool-field__hint" id="dev-jwt-hint">Parola, API anahtarı veya hassas token’ları yalnızca güvendiğiniz cihazda inceleyin.</p>
                        <div class="tool-actions">
                            <button class="button button--primary" type="button" data-jwt-run>Çözümle</button>
                        </div>
                        <div class="dev-jwt-grid">
                            <div>
                                <span class="dev-output-label">Başlık</span>
                                <pre class="tool-output" id="dev-jwt-header" tabindex="0"></pre>
                            </div>
                            <div>
                                <span class="dev-output-label">Payload</span>
                                <pre class="tool-output" id="dev-jwt-payload" tabindex="0"></pre>
                            </div>
                        </div>
                        <p class="tool-status" role="status" aria-live="polite" data-dev-status="jwt"></p>
                    </section>

                    <noscript>
                        <p class="tool-noscript">Dönüşümler JavaScript ile yapılır. JavaScript kapalıyken bu araç çalışmaz.</p>
                    </noscript>
                </div>
</div>
        </div>
    </div>
</section>
</main>
<script>
/*
 * Tarayıcı araçları için ortak yardımcılar.
 *
 * Bu dosya sunucuya istek göndermez; tüm yardımcılar dosyanın içinde
 * tanımlıdır ve başka bir dosyaya bağımlılık yoktur.
 */
(function (root, factory) {
    'use strict';

    root.PortfolioTools = root.PortfolioTools || {};
    root.PortfolioTools.common = factory();
}(typeof globalThis !== 'undefined' ? globalThis : this, function () {
    'use strict';

    function formatBytes(bytes) {
        var value = Number(bytes);

        if (!isFinite(value) || value < 0) {
            return '0 B';
        }

        if (value < 1024) {
            return Math.round(value) + ' B';
        }

        if (value < 1024 * 1024) {
            return (value / 1024).toFixed(1).replace('.', ',') + ' KB';
        }

        if (value < 1024 * 1024 * 1024) {
            return (value / (1024 * 1024)).toFixed(1).replace('.', ',') + ' MB';
        }

        return (value / (1024 * 1024 * 1024)).toFixed(2).replace('.', ',') + ' GB';
    }

    function safeFilename(name, fallback) {
        var value = typeof name === 'string' ? name : '';
        value = value.replace(/[\\/:*?"<>|\u0000-\u001f\u007f]/g, '-');
        value = value.replace(/\s+/g, ' ').trim();
        value = value.replace(/^\.+/, '');

        if (value === '') {
            value = typeof fallback === 'string' && fallback !== '' ? fallback : 'dosya';
        }

        if (value.length > 120) {
            value = value.slice(0, 120);
        }

        return value;
    }

    function debounce(callback, wait) {
        var timer = null;

        return function () {
            var args = arguments;
            var context = this;

            if (timer !== null) {
                clearTimeout(timer);
            }

            timer = setTimeout(function () {
                timer = null;
                callback.apply(context, args);
            }, wait);
        };
    }

    function setStatus(element, message, isError) {
        if (!element) {
            return;
        }

        element.textContent = message || '';
        element.classList.toggle('is-error', Boolean(isError));
    }

    function downloadBlob(blob, filename) {
        if (!blob || typeof document === 'undefined') {
            return false;
        }

        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');

        link.href = url;
        link.download = safeFilename(filename, 'indirme');
        link.rel = 'noopener';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        setTimeout(function () {
            URL.revokeObjectURL(url);
        }, 30000);

        return true;
    }

    function downloadText(text, mime, filename) {
        return downloadBlob(new Blob([text], { type: mime + ';charset=utf-8' }), filename);
    }

    function copyText(text) {
        if (typeof navigator !== 'undefined' && navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
            return navigator.clipboard.writeText(text);
        }

        return new Promise(function (resolve, reject) {
            if (typeof document === 'undefined') {
                reject(new Error('Panoya kopyalama bu ortamda kullanılamıyor.'));
                return;
            }

            var area = document.createElement('textarea');
            area.value = text;
            area.setAttribute('readonly', 'readonly');
            area.className = 'visually-hidden';
            document.body.appendChild(area);
            area.select();

            try {
                var copied = document.execCommand('copy');
                document.body.removeChild(area);

                if (copied) {
                    resolve();
                } else {
                    reject(new Error('Panoya kopyalama tarayıcı tarafından engellendi.'));
                }
            } catch (error) {
                document.body.removeChild(area);
                reject(new Error('Panoya kopyalama bu tarayıcıda desteklenmiyor.'));
            }
        });
    }

    function extensionOf(name) {
        var value = typeof name === 'string' ? name : '';
        var dot = value.lastIndexOf('.');

        return dot > 0 ? value.slice(dot + 1).toLowerCase() : '';
    }

    function baseName(name) {
        var value = typeof name === 'string' ? name : '';
        var dot = value.lastIndexOf('.');

        return dot > 0 ? value.slice(0, dot) : value;
    }

    return {
        formatBytes: formatBytes,
        safeFilename: safeFilename,
        debounce: debounce,
        setStatus: setStatus,
        downloadBlob: downloadBlob,
        downloadText: downloadText,
        copyText: copyText,
        extensionOf: extensionOf,
        baseName: baseName
    };
}));

/*
 * Dev Toolbox — tamamen tarayıcıda çalışan geliştirici dönüşümleri.
 *
 * Ağ isteği yoktur. JWT yalnızca çözümlenir; imza doğrulanmaz.
 */
(function (root, factory) {
    'use strict';

    root.PortfolioTools = root.PortfolioTools || {};
    root.PortfolioTools.devToolbox = factory(root.PortfolioTools.common);
}(typeof globalThis !== 'undefined' ? globalThis : this, function (common) {
    'use strict';

    var MAX_INPUT_BYTES = 2 * 1024 * 1024;

    function toolError(message, details) {
        var error = new Error(message);

        if (details) {
            error.details = details;
        }

        return error;
    }

    function positionFromOffset(text, offset) {
        var limit = Math.max(0, Math.min(Number(offset) || 0, text.length));
        var line = 1;
        var column = 1;

        for (var index = 0; index < limit; index += 1) {
            if (text.charAt(index) === '\n') {
                line += 1;
                column = 1;
            } else {
                column += 1;
            }
        }

        return { line: line, column: column, offset: limit };
    }

    function extractJsonErrorPosition(message, text) {
        var lineColumn = /line\s+(\d+)\s*(?:,|at|,?\s+column\s*)?\s*column\s*(\d+)/i.exec(message);

        if (lineColumn) {
            return {
                line: parseInt(lineColumn[1], 10),
                column: parseInt(lineColumn[2], 10),
                offset: null
            };
        }

        lineColumn = /line\s+(\d+)\s+column\s+(\d+)/i.exec(message);

        if (lineColumn) {
            return {
                line: parseInt(lineColumn[1], 10),
                column: parseInt(lineColumn[2], 10),
                offset: null
            };
        }

        var position = /position\s+(\d+)/i.exec(message);

        if (position) {
            return positionFromOffset(text, parseInt(position[1], 10));
        }

        return null;
    }

    function jsonError(error, text) {
        var raw = error && error.message ? error.message : 'JSON ayrıştırılamadı.';
        var position = extractJsonErrorPosition(raw, text);
        var pretty = raw
            .replace(/\(line\s+(\d+)\s+column\s+(\d+)\)/i, '(satır $1, sütun $2)')
            .replace(/line\s+(\d+)\s+column\s+(\d+)/i, 'satır $1, sütun $2');
        var message = 'Geçersiz JSON: ' + pretty;

        if (position && !/satır\s+\d+/i.test(pretty)) {
            message += ' (satır ' + position.line + ', sütun ' + position.column + ')';
        }

        var result = toolError(message);
        result.position = position;
        result.raw = raw;

        return result;
    }

    function parseJson(text) {
        if (typeof text !== 'string' || text.trim() === '') {
            throw toolError('JSON girdisi boş. Bir nesne, dizi veya değer girin.');
        }

        if (text.length > MAX_INPUT_BYTES) {
            throw toolError('JSON girdisi çok büyük. En fazla 2 MB metin işlenebilir.');
        }

        try {
            return JSON.parse(text);
        } catch (error) {
            throw jsonError(error, text);
        }
    }

    function formatJson(text, space) {
        var value = parseJson(text);
        var indent = typeof space === 'number' ? space : 2;

        return JSON.stringify(value, null, indent);
    }

    function minifyJson(text) {
        return JSON.stringify(parseJson(text));
    }

    function normalizeBase64(value) {
        var cleaned = String(value).replace(/\s+/g, '').replace(/-/g, '+').replace(/_/g, '/');

        if (cleaned === '') {
            throw toolError('Base64 girdisi boş.');
        }

        if (!/^[A-Za-z0-9+/]*={0,2}$/.test(cleaned)) {
            throw toolError('Base64 girdisi geçersiz karakter içeriyor.');
        }

        if (cleaned.indexOf('=') !== -1 && cleaned.indexOf('=') < cleaned.length - 2) {
            throw toolError('Base64 dolgusu geçersiz.');
        }

        if (cleaned.length % 4 === 1) {
            throw toolError('Base64 uzunluğu geçersiz.');
        }

        while (cleaned.length % 4 !== 0) {
            cleaned += '=';
        }

        return cleaned;
    }

    function bytesToBase64(bytes) {
        var binary = '';
        var chunk = 0x8000;

        for (var index = 0; index < bytes.length; index += chunk) {
            binary += String.fromCharCode.apply(null, bytes.subarray(index, index + chunk));
        }

        return btoa(binary);
    }

    function base64ToBytes(value) {
        var normalized = normalizeBase64(value);
        var binary;

        try {
            binary = atob(normalized);
        } catch (error) {
            throw toolError('Base64 çözülemedi. Girdiyi kontrol edin.');
        }

        var bytes = new Uint8Array(binary.length);

        for (var index = 0; index < binary.length; index += 1) {
            bytes[index] = binary.charCodeAt(index);
        }

        return bytes;
    }

    function utf8ToBase64(text) {
        return bytesToBase64(new TextEncoder().encode(String(text)));
    }

    function base64ToUtf8(value) {
        var bytes = base64ToBytes(value);

        try {
            return new TextDecoder('utf-8', { fatal: true }).decode(bytes);
        } catch (error) {
            throw toolError('Base64 içeriği geçerli UTF-8 metni değil.');
        }
    }

    function urlEncode(text) {
        try {
            return encodeURIComponent(String(text));
        } catch (error) {
            throw toolError('Metin URL için kodlanamadı. Eşleşmeyen vekil karakter olabilir.');
        }
    }

    function urlDecode(text) {
        try {
            return decodeURIComponent(String(text));
        } catch (error) {
            throw toolError('URL kodlaması geçersiz: eksik veya hatalı % dizisi var.');
        }
    }

    function textToUtf8Hex(text) {
        var bytes = new TextEncoder().encode(String(text));
        var parts = [];

        for (var index = 0; index < bytes.length; index += 1) {
            parts.push(bytes[index].toString(16).padStart(2, '0'));
        }

        return parts.join(' ');
    }

    function utf8HexToText(value) {
        var cleaned = String(value).replace(/[\s,]+/g, '').replace(/^0x/i, '');

        if (cleaned === '') {
            throw toolError('Hex girdisi boş.');
        }

        if (!/^[0-9a-f]+$/i.test(cleaned)) {
            throw toolError('Hex girdisi yalnızca 0-9 ve a-f karakterlerini içermelidir.');
        }

        if (cleaned.length % 2 !== 0) {
            throw toolError('Hex girdisinin bayt sayısı çift olmalıdır.');
        }

        var bytes = new Uint8Array(cleaned.length / 2);

        for (var index = 0; index < bytes.length; index += 1) {
            bytes[index] = parseInt(cleaned.slice(index * 2, index * 2 + 2), 16);
        }

        try {
            return new TextDecoder('utf-8', { fatal: true }).decode(bytes);
        } catch (error) {
            throw toolError('Baytlar geçerli UTF-8 metni oluşturmuyor.');
        }
    }

    function hashText(text, algorithm) {
        if (typeof crypto === 'undefined' || !crypto.subtle || typeof crypto.subtle.digest !== 'function') {
            return Promise.reject(toolError('Web Crypto API bu tarayıcıda kullanılamıyor.'));
        }

        var name = String(algorithm || 'SHA-256').toUpperCase();

        if (['SHA-1', 'SHA-256', 'SHA-384', 'SHA-512'].indexOf(name) === -1) {
            return Promise.reject(toolError('Desteklenmeyen hash algoritması.'));
        }

        var data = new TextEncoder().encode(String(text));

        return crypto.subtle.digest(name, data).then(function (buffer) {
            var bytes = new Uint8Array(buffer);
            var parts = [];

            for (var index = 0; index < bytes.length; index += 1) {
                parts.push(bytes[index].toString(16).padStart(2, '0'));
            }

            return parts.join('');
        });
    }

    function base64UrlToUtf8(value) {
        var normalized = String(value).replace(/-/g, '+').replace(/_/g, '/');

        if (normalized === '') {
            throw toolError('JWT bölümü boş.');
        }

        return base64ToUtf8(normalized);
    }

    function decodeJwt(token) {
        var value = String(token).trim();

        if (value === '') {
            throw toolError('JWT boş. Bir token girin.');
        }

        if (value.length > MAX_INPUT_BYTES) {
            throw toolError('JWT çok büyük. En fazla 2 MB metin işlenebilir.');
        }

        var parts = value.split('.');

        if (parts.length !== 3) {
            throw toolError('JWT üç noktayla ayrılmış üç bölüm içermelidir.');
        }

        var headerText;
        var payloadText;

        try {
            headerText = base64UrlToUtf8(parts[0]);
        } catch (error) {
            throw toolError('JWT başlığı Base64URL olarak çözülemedi.');
        }

        try {
            payloadText = base64UrlToUtf8(parts[1]);
        } catch (error) {
            throw toolError('JWT payload bölümü Base64URL olarak çözülemedi.');
        }

        var header;
        var payload;

        try {
            header = JSON.parse(headerText);
        } catch (error) {
            throw toolError('JWT başlığı geçerli JSON değil.');
        }

        try {
            payload = JSON.parse(payloadText);
        } catch (error) {
            throw toolError('JWT payload bölümü geçerli JSON değil.');
        }

        return {
            header: header,
            payload: payload,
            headerText: JSON.stringify(header, null, 2),
            payloadText: JSON.stringify(payload, null, 2),
            signature: parts[2],
            verified: false
        };
    }

    function extractXmlError(message) {
        var raw = String(message).replace(/\s+/g, ' ').trim();
        var cut = raw.indexOf('Below is a rendering');
        var text = (cut === -1 ? raw : raw.slice(0, cut)).trim();
        text = text.replace(/^This page contains the following errors:\s*/i, '');
        var line = /line\s+(\d+)/i.exec(text);
        var column = /column\s+(\d+)/i.exec(text);

        text = text
            .replace(/line\s+(\d+)\s+at\s+column\s+(\d+)/i, 'satır $1, sütun $2')
            .replace(/line\s+(\d+)\s+column\s+(\d+)/i, 'satır $1, sütun $2');

        return {
            message: text,
            line: line ? parseInt(line[1], 10) : null,
            column: column ? parseInt(column[1], 10) : null
        };
    }

    function validateXml(text) {
        if (typeof text !== 'string' || text.trim() === '') {
            return { valid: false, message: 'XML girdisi boş.', line: null, column: null };
        }

        if (text.length > MAX_INPUT_BYTES) {
            return { valid: false, message: 'XML girdisi çok büyük. En fazla 2 MB metin işlenebilir.', line: null, column: null };
        }

        if (typeof DOMParser === 'undefined') {
            return { valid: false, message: 'XML doğrulaması bu ortamda kullanılamıyor.', line: null, column: null };
        }

        var document;

        try {
            document = new DOMParser().parseFromString(text, 'application/xml');
        } catch (error) {
            return { valid: false, message: 'XML ayrıştırılamadı.', line: null, column: null };
        }

        var parserError = document.querySelector('parsererror');

        if (parserError) {
            var details = extractXmlError(parserError.textContent || 'XML ayrıştırılamadı.');
            var message = 'Geçersiz XML: ' + details.message;

            if (details.line !== null && details.column !== null && !/satır\s+\d+/i.test(details.message)) {
                message += ' (satır ' + details.line + ', sütun ' + details.column + ')';
            }

            return {
                valid: false,
                message: message,
                line: details.line,
                column: details.column
            };
        }

        return {
            valid: true,
            message: 'XML geçerli ve iyi biçimlendirilmiş.',
            line: null,
            column: null
        };
    }

    function init() {
        if (typeof document === 'undefined') {
            return;
        }

        var tabs = Array.prototype.slice.call(document.querySelectorAll('[data-dev-tab]'));
        var panels = Array.prototype.slice.call(document.querySelectorAll('[data-dev-panel]'));

        if (tabs.length === 0 || panels.length === 0) {
            return;
        }

        function activate(name) {
            tabs.forEach(function (tab) {
                var active = tab.getAttribute('data-dev-tab') === name;
                tab.setAttribute('aria-selected', active ? 'true' : 'false');
                tab.setAttribute('tabindex', active ? '0' : '-1');
            });

            panels.forEach(function (panel) {
                panel.hidden = panel.getAttribute('data-dev-panel') !== name;
            });
        }

        tabs.forEach(function (tab, index) {
            tab.addEventListener('click', function () {
                activate(tab.getAttribute('data-dev-tab'));
            });

            tab.addEventListener('keydown', function (event) {
                var next = null;

                if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
                    next = tabs[(index + 1) % tabs.length];
                } else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
                    next = tabs[(index - 1 + tabs.length) % tabs.length];
                } else if (event.key === 'Home') {
                    next = tabs[0];
                } else if (event.key === 'End') {
                    next = tabs[tabs.length - 1];
                }

                if (next) {
                    event.preventDefault();
                    activate(next.getAttribute('data-dev-tab'));
                    next.focus();
                }
            });
        });

        var jsonInput = document.getElementById('dev-json-input');
        var jsonOutput = document.getElementById('dev-json-output');
        var jsonStatus = document.querySelector('[data-dev-status="json"]');

        function runJson(mode) {
            if (!jsonInput || !jsonOutput || !jsonStatus) {
                return;
            }

            try {
                if (mode === 'minify') {
                    jsonOutput.textContent = minifyJson(jsonInput.value);
                } else {
                    jsonOutput.textContent = formatJson(jsonInput.value, 2);
                }

                jsonStatus.textContent = mode === 'minify' ? 'JSON küçültüldü.' : 'JSON biçimlendirildi.';
                jsonStatus.classList.remove('is-error');
            } catch (error) {
                jsonOutput.textContent = '';
                jsonStatus.textContent = error.message;
                jsonStatus.classList.add('is-error');
            }
        }

        var jsonFormat = document.querySelector('[data-json-format]');
        var jsonMinify = document.querySelector('[data-json-minify]');
        var jsonValidate = document.querySelector('[data-json-validate]');

        if (jsonFormat) {
            jsonFormat.addEventListener('click', function () {
                runJson('format');
            });
        }

        if (jsonMinify) {
            jsonMinify.addEventListener('click', function () {
                runJson('minify');
            });
        }

        if (jsonValidate) {
            jsonValidate.addEventListener('click', function () {
                if (!jsonInput || !jsonStatus) {
                    return;
                }

                try {
                    parseJson(jsonInput.value);
                    jsonStatus.textContent = 'JSON geçerli.';
                    jsonStatus.classList.remove('is-error');
                } catch (error) {
                    jsonStatus.textContent = error.message;
                    jsonStatus.classList.add('is-error');
                }
            });
        }

        var xmlInput = document.getElementById('dev-xml-input');
        var xmlStatus = document.querySelector('[data-dev-status="xml"]');
        var xmlValidate = document.querySelector('[data-xml-validate]');

        if (xmlValidate) {
            xmlValidate.addEventListener('click', function () {
                if (!xmlInput || !xmlStatus) {
                    return;
                }

                var result = validateXml(xmlInput.value);
                xmlStatus.textContent = result.message;
                xmlStatus.classList.toggle('is-error', !result.valid);
            });
        }

        var baseInput = document.getElementById('dev-base64-input');
        var baseMode = document.getElementById('dev-base64-mode');
        var baseOutput = document.getElementById('dev-base64-output');
        var baseStatus = document.querySelector('[data-dev-status="base64"]');
        var baseRun = document.querySelector('[data-base64-run]');

        if (baseRun) {
            baseRun.addEventListener('click', function () {
                if (!baseInput || !baseMode || !baseOutput || !baseStatus) {
                    return;
                }

                try {
                    baseOutput.textContent = baseMode.value === 'decode'
                        ? base64ToUtf8(baseInput.value)
                        : utf8ToBase64(baseInput.value);
                    baseStatus.textContent = baseMode.value === 'decode' ? 'Base64 çözüldü.' : 'Base64 kodlandı.';
                    baseStatus.classList.remove('is-error');
                } catch (error) {
                    baseOutput.textContent = '';
                    baseStatus.textContent = error.message;
                    baseStatus.classList.add('is-error');
                }
            });
        }

        var urlInput = document.getElementById('dev-url-input');
        var urlMode = document.getElementById('dev-url-mode');
        var urlOutput = document.getElementById('dev-url-output');
        var urlStatus = document.querySelector('[data-dev-status="url"]');
        var urlRun = document.querySelector('[data-url-run]');

        if (urlRun) {
            urlRun.addEventListener('click', function () {
                if (!urlInput || !urlMode || !urlOutput || !urlStatus) {
                    return;
                }

                try {
                    urlOutput.textContent = urlMode.value === 'decode'
                        ? urlDecode(urlInput.value)
                        : urlEncode(urlInput.value);
                    urlStatus.textContent = urlMode.value === 'decode' ? 'URL kodu çözüldü.' : 'URL için kodlandı.';
                    urlStatus.classList.remove('is-error');
                } catch (error) {
                    urlOutput.textContent = '';
                    urlStatus.textContent = error.message;
                    urlStatus.classList.add('is-error');
                }
            });
        }

        var utfInput = document.getElementById('dev-utf8-input');
        var utfMode = document.getElementById('dev-utf8-mode');
        var utfOutput = document.getElementById('dev-utf8-output');
        var utfStatus = document.querySelector('[data-dev-status="utf8"]');
        var utfRun = document.querySelector('[data-utf8-run]');

        if (utfRun) {
            utfRun.addEventListener('click', function () {
                if (!utfInput || !utfMode || !utfOutput || !utfStatus) {
                    return;
                }

                try {
                    utfOutput.textContent = utfMode.value === 'decode'
                        ? utf8HexToText(utfInput.value)
                        : textToUtf8Hex(utfInput.value);
                    utfStatus.textContent = utfMode.value === 'decode' ? 'UTF-8 metne çevrildi.' : 'UTF-8 baytları üretildi.';
                    utfStatus.classList.remove('is-error');
                } catch (error) {
                    utfOutput.textContent = '';
                    utfStatus.textContent = error.message;
                    utfStatus.classList.add('is-error');
                }
            });
        }

        var hashInput = document.getElementById('dev-hash-input');
        var hashAlgorithm = document.getElementById('dev-hash-algorithm');
        var hashOutput = document.getElementById('dev-hash-output');
        var hashStatus = document.querySelector('[data-dev-status="hash"]');
        var hashRun = document.querySelector('[data-hash-run]');

        if (hashRun) {
            hashRun.addEventListener('click', function () {
                if (!hashInput || !hashAlgorithm || !hashOutput || !hashStatus) {
                    return;
                }

                hashStatus.textContent = 'Hash hesaplanıyor…';
                hashStatus.classList.remove('is-error');
                hashOutput.textContent = '';

                hashText(hashInput.value, hashAlgorithm.value).then(function (hex) {
                    hashOutput.textContent = hex;
                    hashStatus.textContent = hashAlgorithm.value + ' hash üretildi.';
                }).catch(function (error) {
                    hashStatus.textContent = error.message;
                    hashStatus.classList.add('is-error');
                });
            });
        }

        var jwtInput = document.getElementById('dev-jwt-input');
        var jwtHeader = document.getElementById('dev-jwt-header');
        var jwtPayload = document.getElementById('dev-jwt-payload');
        var jwtStatus = document.querySelector('[data-dev-status="jwt"]');
        var jwtRun = document.querySelector('[data-jwt-run]');

        if (jwtRun) {
            jwtRun.addEventListener('click', function () {
                if (!jwtInput || !jwtHeader || !jwtPayload || !jwtStatus) {
                    return;
                }

                try {
                    var decoded = decodeJwt(jwtInput.value);
                    jwtHeader.textContent = decoded.headerText;
                    jwtPayload.textContent = decoded.payloadText;
                    jwtStatus.textContent = 'Token çözümlendi. İmza doğrulanmadı; bu görünüm token’ın geçerli veya güvenilir olduğunu göstermez.';
                    jwtStatus.classList.remove('is-error');
                } catch (error) {
                    jwtHeader.textContent = '';
                    jwtPayload.textContent = '';
                    jwtStatus.textContent = error.message;
                    jwtStatus.classList.add('is-error');
                }
            });
        }

        document.querySelectorAll('[data-copy-target]').forEach(function (button) {
            button.addEventListener('click', function () {
                var target = document.getElementById(button.getAttribute('data-copy-target'));

                if (!target) {
                    return;
                }

                var text = 'value' in target ? target.value : target.textContent;

                if (!text) {
                    return;
                }

                common.copyText(text).catch(function () {
                    /* Pano izni yoksa sessizce kal; kullanıcı metni seçebilir. */
                });
            });
        });
    }

    if (typeof document !== 'undefined') {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
    }

    return {
        MAX_INPUT_BYTES: MAX_INPUT_BYTES,
        extractJsonErrorPosition: extractJsonErrorPosition,
        parseJson: parseJson,
        formatJson: formatJson,
        minifyJson: minifyJson,
        utf8ToBase64: utf8ToBase64,
        base64ToUtf8: base64ToUtf8,
        urlEncode: urlEncode,
        urlDecode: urlDecode,
        textToUtf8Hex: textToUtf8Hex,
        utf8HexToText: utf8HexToText,
        hashText: hashText,
        decodeJwt: decodeJwt,
        extractXmlError: extractXmlError,
        validateXml: validateXml
    };
}));

</script>
</body>
</html>
