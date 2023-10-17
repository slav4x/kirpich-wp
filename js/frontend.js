document.addEventListener("DOMContentLoaded", function () {
  const filter = document.querySelector(".page-filter");
  if (filter) {
    const checkboxes = document.querySelectorAll(
      '.page-filter input[type="checkbox"]'
    );
    const items = document.querySelectorAll(".item-grid .item");
    const noResultsMessage = document.querySelector(".no-results-message");
    const minPriceInput = document.getElementById("min-price");
    const maxPriceInput = document.getElementById("max-price");
    const resetButton = document.querySelector(".page-filter__reset");
    const itemBanners = document.querySelectorAll(".item-banner");
    const hits = document.querySelectorAll(".hit");
    const catalogElement = document.getElementById("catalog");
    const initialMinPrice = parseFloat(minPriceInput.getAttribute("data-min"));
    const initialMaxPrice = parseFloat(maxPriceInput.getAttribute("data-max"));

    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", updateFilters);
    });

    setCheckboxesFromURLParams();

    minPriceInput.addEventListener("input", updateFilters);
    maxPriceInput.addEventListener("input", updateFilters);

    const range = $(".js-range-slider");
    const inputFrom = $('input[name="min"]');
    const inputTo = $('input[name="max"]');
    const min = range.attr("data-min");
    const max = range.attr("data-max");
    let from = range.attr("data-from");
    let to = range.attr("data-to");
    let instance;

    range.ionRangeSlider({
      skin: "round",
      type: "double",
      min,
      max,
      from,
      to,
      onChange: updateInputs,
      onFinish: updateInputsFinish,
    });
    instance = range.data("ionRangeSlider");

    resetButton.addEventListener("click", resetFilters);

    const queryParams = new URLSearchParams(window.location.search);
    if (
      queryParams.has("minPrice") ||
      queryParams.has("maxPrice") ||
      queryParams.has("другие_фильтры")
    ) {
      const selectedFilters = {};
      queryParams.forEach((value, key) => {
        selectedFilters[key] = value;
      });
      applyFilters(selectedFilters);

      itemBanners.forEach((itemBanner) => {
        itemBanner.classList.add("hidden");
      });

      hits.forEach((hit) => {
        hit.classList.add("hidden");
      });
    }

    function setCheckboxesFromURLParams() {
      const queryParams = new URLSearchParams(window.location.search);

      checkboxes.forEach((checkbox) => {
        const filterName = checkbox.getAttribute("data-filter");
        const filterValue = checkbox.value;

        if (queryParams.has(filterName)) {
          const filterValues = queryParams.getAll(filterName);

          // Обработка чекбоксов
          if (filterValues.includes(filterValue)) {
            checkbox.checked = true;
          } else {
            checkbox.checked = false;
          }
        } else {
          checkbox.checked = false;
        }
      });

      // Проверка чекбоксов после установки значений
      checkboxes.forEach((checkbox) => {
        const filterName = checkbox.getAttribute("data-filter");
        const filterValue = checkbox.value;

        if (checkbox.checked && !queryParams.has(filterName)) {
          queryParams.append(filterName, filterValue);
        }
      });

      // Обновление URL с учетом измененных чекбоксов
      const newUrl = `${window.location.pathname}?${queryParams}`;
      window.history.replaceState({ path: newUrl }, "", newUrl);
    }

    function updateFilters() {
      const selectedFilters = {};

      checkboxes.forEach((checkbox) => {
        const filterName = checkbox.getAttribute("data-filter");
        const filterValue = checkbox.value;

        if (checkbox.checked) {
          if (!selectedFilters[filterName]) {
            selectedFilters[filterName] = [];
          }
          selectedFilters[filterName].push(filterValue);
        }
      });

      selectedFilters["minPrice"] =
        parseFloat(minPriceInput.value) || initialMinPrice;
      selectedFilters["maxPrice"] =
        parseFloat(maxPriceInput.value) || initialMaxPrice;

      const queryParams = new URLSearchParams(selectedFilters);
      const newUrl = `${window.location.pathname}?${queryParams}`;
      window.history.pushState({ path: newUrl }, "", newUrl);

      applyFilters(selectedFilters);

      if (
        Object.keys(selectedFilters).length > 0 ||
        selectedFilters["minPrice"] > initialMinPrice ||
        selectedFilters["maxPrice"] < initialMaxPrice
      ) {
        itemBanners.forEach((itemBanner) => {
          itemBanner.classList.add("hidden");
        });
        hits.forEach((hit) => {
          hit.classList.add("hidden");
        });
      } else {
        itemBanners.forEach((itemBanner) => {
          itemBanner.classList.remove("hidden");
        });
        hits.forEach((hit) => {
          hit.classList.remove("hidden");
        });
      }

      scrollToCatalog();
    }

    function applyFilters(selectedFilters) {
      items.forEach((item) => {
        let shouldShow = true;
        for (const filter in selectedFilters) {
          if (selectedFilters.hasOwnProperty(filter)) {
            const filterValues = selectedFilters[filter];
            if (filter === "minPrice" || filter === "maxPrice") {
              const itemPrice = parseFloat(item.getAttribute("data-price"));
              if (
                itemPrice < selectedFilters["minPrice"] ||
                itemPrice > selectedFilters["maxPrice"]
              ) {
                shouldShow = false;
                break;
              }
            } else {
              const itemValue = item.getAttribute(`data-${filter}`);
              if (itemValue && !filterValues.includes(itemValue)) {
                shouldShow = false;
                break;
              }
            }
          }
        }
        if (shouldShow) {
          item.classList.remove("hidden");
        } else {
          item.classList.add("hidden");
        }
      });

      const visibleItems = document.querySelectorAll(
        ".item-grid .item:not(.hidden)"
      );

      if (visibleItems.length === 0) {
        noResultsMessage.classList.remove("hidden");
      } else {
        noResultsMessage.classList.add("hidden");
      }
    }

    function updateInputs(data) {
      from = data.from;
      to = data.to;

      inputFrom.val(from);
      inputTo.val(to);
    }

    function updateInputsFinish(data) {
      from = data.from;
      to = data.to;

      inputFrom.val(from);
      inputTo.val(to);

      updateFilters();
    }

    inputFrom.on("change", function () {
      let val = $(this).val();

      if (val < min) {
        val = min;
      } else if (val > to) {
        val = to;
      }

      instance.update({
        from: val,
      });

      $(this).val(val);
    });

    inputTo.on("change", function () {
      let val = $(this).val();

      if (val < from) {
        val = from;
      } else if (val > max) {
        val = max;
      }

      instance.update({
        to: val,
      });

      $(this).val(val);
    });

    function resetFilters() {
      checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
      });
      minPriceInput.value = "";
      maxPriceInput.value = "";
      instance.update({
        from: min,
        to: max,
      });
      updateFilters();

      itemBanners.forEach((itemBanner) => {
        itemBanner.classList.remove("hidden");
      });

      hits.forEach((hit) => {
        hit.classList.remove("hidden");
      });

      scrollToCatalog();
    }

    function scrollToCatalog() {
      catalogElement.scrollIntoView({ behavior: "smooth" });
    }
  }
});

const searchIcon = document.querySelector(".top-search");
const searchForm = document.querySelector(".search-form");
searchIcon.addEventListener("click", function () {
  searchForm.classList.toggle("open");
});

document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("form");

  forms.forEach(function (form) {
    form.addEventListener("submit", function () {
      const button = form.querySelector(".btn");

      button.style.opacity = 0.5;
      button.style.cursor = "not-allowed";
      button.disabled = true;
      button.textContent = "Отправка...";
    });
  });
});
