<style>
        /* Filters */
        .filters {
            display: flex;
            background: white;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 150px;
        }

        .filter-label {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 0.3rem;
        }

        .filter-control {
            display: flex;
            align-items: center;
        }

        .filter-control select,
        .filter-control input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        #daterangepicker {
            display: flex;
            align-items: center;
        }

        #daterangepicker input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        #daterangepicker label {
            text-transform: uppercase;
        }

        .date-input {
            position: relative;
        }

        .date-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            pointer-events: none;
        }

        .view-btn {
            background-color: rgb(170, 230, 235);
            color: rgb(53, 155, 138);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.2s;
            align-self: flex-end;
        }

        .view-btn:hover {
            background-color: rgb(96, 208, 228);
        }

        /* Table */
        .reports-table {
            width: 100%;
            background: white;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            /* overflow: hidden; */
        }

        .reports-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .reports-table th {
            background-color: #f9f9f9;
            text-align: center;
            vertical-align: middle;
            padding: 0.8rem;
            font-weight: 600;
            color: #444;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
            border-bottom: 2px solid #eee;
        }

        .reports-table td {
            /* padding: 0.8rem; */
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
            color: #333;
        }

        .reports-table tr:hover {
            background-color: #f9f9f9;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-completed {
            background-color: #e6e6e6;
            color: #555;
        }

        .more-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.3rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: background-color 0.2s;
        }

        .more-btn:hover {
            background-color: #2980b9;
        }
    </style>