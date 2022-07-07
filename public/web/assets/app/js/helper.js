async function postData(url = "", data = {}) {
    // Default options are marked with *
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const response = await fetch(url, {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        referrerPolicy: "no-referrer",
        body: JSON.stringify(data),
    });
    return response.json(); // parses JSON response into native JavaScript objects
}
