cat << EOF > ./agent-config.yaml
metrics:
  global:
    scrape_interval: 60s
  configs:
  - name: hosted-prometheus
    scrape_configs:
      - job_name: node
        static_configs:
        - targets: ['localhost:9100']
    remote_write:
      - url: https://prometheus-prod-40-prod-sa-east-1.grafana.net/api/prom/push
        basic_auth:
          username: 1156712
          password: glc_eyJvIjoiOTI5NTQzIiwibiI6ImFydGVjLXByb21ldGhldXMiLCJrIjoiZ00wN05kNnUzSnhlaURTdUMwMjc1OW83IiwibSI6eyJyIjoicHJvZC1zYS1lYXN0LTEifX0=
EOF