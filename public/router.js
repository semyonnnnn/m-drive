document.addEventListener("click", (e) => {
  const link = e.target.closest("a");
  if (!link) return;

  const url = link.getAttribute("href");

  // Only handle internal links
  if (url.startsWith("/")) {
    e.preventDefault(); // Prevent full page reload
    console.log("hi");
    loadPage(url); // Custom function to fetch and insert content
    history.pushState(null, "", url); // Update browser URL
  }
});

window.addEventListener("popstate", () => {
  loadPage(location.pathname);
});

async function loadPage(url) {
  try {
    const res = await fetch(url, {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    });
    const html = await res.text();

    // Insert into a container
    document.querySelector("#content").innerHTML = html;

    // Optionally re-run scripts, initialize components, etc.
  } catch (err) {
    console.error("Failed to load page", err);
  }
}
