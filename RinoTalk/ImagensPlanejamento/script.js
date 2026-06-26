const root = document.documentElement;
const themeToggle = document.querySelector("#themeToggle");
const themeLabel = document.querySelector("#themeLabel");

function saveTheme(theme) {
  try {
    localStorage.setItem("rinotalk-theme", theme);
  } catch (error) {
    return;
  }
}

function applyTheme(theme) {
  if (!themeToggle || !themeLabel) return;

  const isDark = theme === "dark";
  root.dataset.theme = isDark ? "dark" : "light";
  themeToggle.setAttribute("aria-pressed", String(isDark));
  themeLabel.textContent = isDark ? "Modo claro" : "Modo escuro";
  saveTheme(isDark ? "dark" : "light");
}

if (themeToggle) {
  themeToggle.addEventListener("click", () => {
    const nextTheme = root.dataset.theme === "dark" ? "light" : "dark";
    applyTheme(nextTheme);
  });
}

applyTheme(root.dataset.theme === "dark" ? "dark" : "light");
